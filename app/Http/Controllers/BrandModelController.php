<?php

namespace App\Http\Controllers;

use App\BrandModel;
use App\Brand;
use Illuminate\Http\Request;

class BrandModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Model Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $json = BrandModel::all();
        $brand = Brand::all();
        return view('apps.pages.setup.product.model',['json'=>$json,'brand'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'brand_id' => 'required',
            'name' => 'required',
        ]);
        $brand=Brand::find($request->brand_id);
        $brand_name = $brand->name;
        $cominfo = new BrandModel;
        $cominfo->brand_id = $request->brand_id;
        $cominfo->brand_name = $brand_name;
        $cominfo->name = $request->name;
        $cominfo->is_active = $request->is_active?$request->is_active:1;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Model Info",$this->moduleName." Added Successfully.");
        return redirect('model')->with('status', 'Model Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = BrandModel::all();
        $data = BrandModel::find($id);
        $brand = Brand::all();
        return view('apps.pages.setup.product.model',['data'=>$data,'json'=>$json,'brand'=>$brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandModel $brandModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand=Brand::find($request->brand_id);
        $brand_name = $brand->name;

        $cominfo = BrandModel::find($id);
        $cominfo->brand_id = $request->brand_id;
        $cominfo->brand_name = $brand_name;
        $cominfo->name = $request->name;
        $cominfo->is_active = $request->is_active?$request->is_active:1;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Model Info",$this->moduleName." Updated Successfully.");
        return redirect('model')->with('status', 'Model Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = BrandModel::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
