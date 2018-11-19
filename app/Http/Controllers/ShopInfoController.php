<?php

namespace App\Http\Controllers;

use App\ShopInfo;
use Illuminate\Http\Request;

class ShopInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Shop Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        return view('apps.pages.setup.shop.shop');
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
            'branch_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);

        $cominfo = new ShopInfo;
        $cominfo->branch_name = $request->branch_name;
        $cominfo->email = $request->email;
        $cominfo->phone_no = $request->phone_no;
        $cominfo->address = $request->address;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Shop Info",$this->moduleName." Added Successfully.");
        return redirect('shop')->with('status', 'Shop Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopInfo  $shopInfo
     * @return \Illuminate\Http\Response
     */
    public function shopList(){
        $json = ShopInfo::all();
        return view('apps.pages.setup.shop.shop-list',['data'=>$json]);
    }

    public function show($id)
    {
        $json = ShopInfo::find($id);
        return view('apps.pages.setup.shop.shop',['data'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopInfo  $shopInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopInfo $shopInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopInfo  $shopInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = ShopInfo::find($id);
        $cominfo->branch_name = $request->branch_name;
        $cominfo->email = $request->email;
        $cominfo->phone_no = $request->phone_no;
        $cominfo->address = $request->address;
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Shop Info",$this->moduleName." Updated Successfully.");
        return redirect('shop')->with('status', 'Shop Updated Successfully!');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopInfo  $shopInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = ShopInfo::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
