<?php

namespace App\Http\Controllers;

use App\ShopReceiving;
use App\Vendor;
use App\Product;
use Illuminate\Http\Request;
use DB;
class ShopReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Shop Receiving Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $pro = Product::all();
        $ven = Vendor::all();
        $json = $this->ShopReceivingParseData();
        // dd($json);
        return view('apps.pages.oparetion.shop_receiving',
            [
                'json'=>$json,
                'pro'=>$pro,
                'ven'=>$ven,
            ]
        );       
    }
    private function ShopReceivingParseData() {
        $json = DB::table('shop_receivings')
                ->leftjoin('products', 'shop_receivings.product_id', '=', 'products.id')
                ->leftjoin('vendors', 'shop_receivings.vendor_id', '=', 'vendors.id')
                ->select('shop_receivings.*', 'products.name as proname','vendors.name as vendorname')
                ->orderBy('shop_receivings.id', 'DESC')
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
            'vendor_id' => 'required',
            'barcode' => 'required',
            'product_id' => 'required',
        ]);
        // dd($request->vendor_id);
        $prosql = Product::find($request->product_id);
        $product_name = $prosql->name;
        // dd($product_name);
        $cominfo = new ShopReceiving;
        $cominfo->vendor_id = $request->vendor_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Shop Receiving Info",$this->moduleName." Added Successfully.");
        return redirect('shop_receiving')->with('status', 'Shop Receiving Type Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopReceiving  $shopReceiving
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ShopReceiving::find($id);
        $json = $this->ShopReceivingParseData();
        $pro = Product::all();
        $ven = Vendor::all();
        return view('apps.pages.oparetion.shop_receiving',
            [
                'data'=>$data,
                'json'=>$json,
                'pro'=>$pro,
                'ven'=>$ven,
            ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopReceiving  $shopReceiving
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopReceiving $shopReceiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopReceiving  $shopReceiving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prosql = Product::find($request->product_id);
        $product_name = $prosql->name;
        $cominfo = ShopReceiving::find($id);
        $cominfo->vendor_id = $request->vendor_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $request->product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Shop Receiving Info",$this->moduleName." Updated Successfully.");
        return redirect('shop_receiving')->with('status', 'Shop Receiving Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopReceiving  $shopReceiving
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = ShopReceiving::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
