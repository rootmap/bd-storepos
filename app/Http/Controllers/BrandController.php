<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Brand Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $json = Brand::all();
        return view('apps.pages.setup.product.brand',['json'=>$json]);
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
            'name' => 'required',
        ]);

        $cominfo = new Brand;
        $cominfo->name = $request->name;
        $cominfo->is_active = $request->is_active?$request->is_active:1;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Brand Info",$this->moduleName." Added Successfully.");
        return redirect('brand')->with('status', 'Brand Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = Brand::all();
        $data = Brand::find($id);
        return view('apps.pages.setup.product.brand',['data'=>$data,'json'=>$json]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = Brand::find($id);
        $cominfo->name = $request->name;
        $cominfo->is_active = $request->is_active?$request->is_active:1;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Brand Info",$this->moduleName." Updated Successfully.");
        return redirect('brand')->with('status', 'Brand Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Brand::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
