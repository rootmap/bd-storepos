<?php

namespace App\Http\Controllers;

use App\DiscountType;
use Illuminate\Http\Request;

class DiscountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Discount Type Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $json = DiscountType::all();
        return view('apps.pages.setup.discount.discount-type',['json'=>$json]);       
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

        $cominfo = new DiscountType;
        $cominfo->name = $request->name;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Discount Type Info",$this->moduleName." Added Successfully.");
        return redirect('discount-type')->with('status', 'Discount Type Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = DiscountType::all();
        $data = DiscountType::find($id);
        return view('apps.pages.setup.discount.discount-type',['data'=>$data,'json'=>$json]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountType $discountType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = DiscountType::find($id);
        $cominfo->name = $request->name;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Discount Type Info",$this->moduleName." Updated Successfully.");
        return redirect('discount-type')->with('status', 'Discount Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscountType  $discountType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = DiscountType::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
