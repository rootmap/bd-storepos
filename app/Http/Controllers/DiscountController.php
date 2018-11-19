<?php

namespace App\Http\Controllers;

use App\Discount;
use App\DiscountType;
use Illuminate\Http\Request;
use DB;
class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Discount Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $dis = DiscountType::all();
        $json = $this->DiscountTypeParseData();
        // dd($dis);
        return view('apps.pages.setup.discount.discount',['json'=>$json,'dis'=>$dis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function DiscountTypeParseData() {
        $json = DB::table('discounts')
                ->leftjoin('discount_types', 'discounts.discount_type_id', '=', 'discount_types.id')
                ->select('discounts.*', 'discount_types.name as discount_types_name')
                ->orderBy('discounts.id', 'DESC')
                ->get();

        return $json;
    }
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
            'discount_type_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        $cominfo = new Discount;
        $cominfo->discount_type_id = $request->discount_type_id;
        $cominfo->name = $request->name;
        $cominfo->price = $request->price;
        $cominfo->is_active = $request->is_active?$request->is_active:1;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Discount Info",$this->moduleName." Added Successfully.");
        return redirect('discount')->with('status', 'Discount Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = Discount::all();
        $data = Discount::find($id);
        return view('apps.pages.setup.discount.discount',['data'=>$data,'json'=>$json]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = Discount::find($id);
        $cominfo->discount_type_id = $request->discount_type_id;
        $cominfo->name = $request->name;
        $cominfo->price = $request->price;
        $cominfo->is_active = $request->is_active?$request->is_active:1;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Discount Info",$this->moduleName." Updated Successfully.");
        return redirect('discount')->with('status', 'Discount Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Discount::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
