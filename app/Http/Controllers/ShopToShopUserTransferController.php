<?php

namespace App\Http\Controllers;

use App\ShopToShopUserTransfer;
use App\ShopInfo;
use App\StoreUser;
use Illuminate\Http\Request;
use DB;
class ShopToShopUserTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Shop To Shop User Transfer Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $ShopInfo = ShopInfo::all();
        $StoreUser = StoreUser::all();
        $json = $this->ShopToShopUserTransferData();
        return view('apps.pages.setup.user.shopToshopTrns',
            [
                'json'=>$json,
                'StoreUser'=>$StoreUser,
                'ShopInfo'=>$ShopInfo,
            ]);       
    }
    private function ShopToShopUserTransferData() {
        $json = DB::table('shop_to_shop_user_transfers')
                ->leftjoin('store_users', 'shop_to_shop_user_transfers.user_id', '=', 'store_users.id')
                ->select('shop_to_shop_user_transfers.*', 'store_users.name as username',DB::raw('(select spos_shop_infos.branch_name from spos_shop_infos where spos_shop_infos.id=spos_shop_to_shop_user_transfers.old_shop_id) as old_shop_name'),DB::raw('(select spos_shop_infos.branch_name from spos_shop_infos where spos_shop_infos.id=spos_shop_to_shop_user_transfers.new_shop_id) as new_shop_name'))
                ->orderBy('shop_to_shop_user_transfers.id', 'DESC')
                ->get();

        return $json;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'user_id' => 'required',
            'old_shop_id' => 'required',
            'new_shop_id' => 'required',
        ]);
        // dd($request->old_shop_id . ' = '. $request->new_shop_id);
        $usersql = StoreUser::find($request->user_id);
        $user_name = $usersql->name;
        $shopsql = ShopInfo::find($request->old_shop_id);
        $oldbranch_name = $shopsql->branch_name;
                dd($oldbranch_name);
        $shoppsql = ShopInfo::find($request->new_shop_id);
        $newbranch_name = $shoppsql->branch_name;
        
        $cominfo = new ShopToShopUserTransfer;
        $cominfo->user_id = $request->user_id;
        $cominfo->user_name = $user_name;
        $cominfo->old_shop_id = $request->old_shop_id;
        $cominfo->old_shop_name = $oldbranch_name;
        $cominfo->new_shop_id = $request->new_shop_id;
        $cominfo->new_shop_name = $newbranch_name;

        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Shop To Shop User Transfer Info",$this->moduleName." Added Successfully.");
        return redirect('shopToshopTrns')->with('status', 'Shop To Shop User Transfer Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopToShopUserTransfer  $shopToShopUserTransfer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ShopToShopUserTransfer::find($id);
        $json = $this->ShopToShopUserTransferData();
        $StoreUser = StoreUser::all();
        $ShopInfo = ShopInfo::all();
        return view('apps.pages.setup.user.shopToshopTrns',
            [
                'data'=>$data,
                'json'=>$json,
                'StoreUser'=>$StoreUser,
                'ShopInfo'=>$ShopInfo,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopToShopUserTransfer  $shopToShopUserTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopToShopUserTransfer $shopToShopUserTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopToShopUserTransfer  $shopToShopUserTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $usersql = StoreUser::find($request->user_id);
        $user_name = $usersql->name;
        $shopsql = ShopInfo::find($request->old_shop_id);
        $oldbranch_name = $shopsql->branch_name;
                // dd($oldbranch_name);
        $shoppsql = ShopInfo::find($request->new_shop_id);
        $newbranch_name = $shoppsql->branch_name;
        
        $cominfo = ShopToShopUserTransfer::find($id);
        $cominfo->user_id = $request->user_id;
        $cominfo->user_name = $user_name;
        $cominfo->old_shop_id = $request->old_shop_id;
        $cominfo->old_shop_name = $oldbranch_name;
        $cominfo->new_shop_id = $request->new_shop_id;
        $cominfo->new_shop_name = $newbranch_name;

        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Shop To Shop User Transfer Info",$this->moduleName." Updated Successfully.");
        return redirect('shopToshopTrns')->with('status', 'Shop To Shop User Transfer Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopToShopUserTransfer  $shopToShopUserTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = ShopToShopUserTransfer::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
