<?php

namespace App\Http\Controllers;

use App\SalesVoid;
use App\StoreUser;
use Illuminate\Http\Request;
use DB;
class SalesVoidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Sales Void Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $StoreUser = StoreUser::all();
        $json = SalesVoid::all();
        return view('apps.pages.sales_void.sales_void',
            [
                'json'=>$json,
                'cus'=>$StoreUser,
            ]);
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
        
        $cominfo = new SalesVoid;
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
     * @param  \App\SalesVoid  $salesVoid
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SalesVoid::find($id);
        $StoreUser = StoreUser::all();
        return view('apps.pages.sales_void.sales_void',
            [
                'data'=>$data,
                'cus'=>$StoreUser,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesVoid  $salesVoid
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesVoid $salesVoid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesVoid  $salesVoid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usersql = StoreUser::find($request->user_id);
        $user_name = $usersql->name;
        
        $cominfo = SalesVoid::find($id);
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
     * @param  \App\SalesVoid  $salesVoid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = SalesVoid::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
