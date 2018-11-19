<?php

namespace App\Http\Controllers;

use App\StockIn;
use App\Vendor;
use App\Product;
use Illuminate\Http\Request;
use DB;
class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Stock In Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $pro = Product::all();
        $ven = Vendor::all();
        $json = $this->StockInParseData();
        // dd($json);
        return view('apps.pages.oparetion.stock_in',
            [
                'json'=>$json,
                'pro'=>$pro,
                'ven'=>$ven,
            ]
        );       
    }
    private function StockInParseData() {
        $json = DB::table('stock_ins')
                ->leftjoin('products', 'stock_ins.product_id', '=', 'products.id')
                ->leftjoin('vendors', 'stock_ins.vendor_id', '=', 'vendors.id')
                ->select('stock_ins.*', 'products.name as proname','vendors.name as vendorname')
                ->orderBy('stock_ins.id', 'DESC')
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

        $prosql = Product::find($request->product_id);
        $product_name = $prosql->name;
        // dd($product_name);
        $cominfo = new StockIn;
        $cominfo->vendor_id = $request->vendor_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Stock In Info",$this->moduleName." Added Successfully.");
        return redirect('stock_in')->with('status', 'Stock In Type Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockIn  $stockIn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = StockIn::find($id);
        $json = $this->StockInParseData();
        $pro = Product::all();
        $ven = Vendor::all();
        return view('apps.pages.oparetion.stock_in',
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
     * @param  \App\StockIn  $stockIn
     * @return \Illuminate\Http\Response
     */
    public function edit(StockIn $stockIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockIn  $stockIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = StockIn::find($id);
        $cominfo->vendor_id = $request->vendor_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $request->product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Stock In Info",$this->moduleName." Updated Successfully.");
        return redirect('stock_in')->with('status', 'Stock In Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockIn  $stockIn
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = StockIn::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
