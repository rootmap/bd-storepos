<?php

namespace App\Http\Controllers;

use App\StockOut;
use App\Customer;
use App\Product;
use DB;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Stock Out Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $pro = Product::all();
        $cus = Customer::all();
        $json = $this->StockOutParseData();
        // dd($json);
        return view('apps.pages.oparetion.stock_out',
            [
                'json'=>$json,
                'pro'=>$pro,
                'cus'=>$cus,
            ]
        );       
    }
    private function StockOutParseData() {
        $json = DB::table('stock_outs')
                ->leftjoin('products', 'stock_outs.product_id', '=', 'products.id')
                ->leftjoin('customers', 'stock_outs.Customer_id', '=', 'customers.id')
                ->select('stock_outs.*', 'products.name as proname','customers.name as customername')
                ->orderBy('stock_outs.id', 'DESC')
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
            'customer_id' => 'required',
            'barcode' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $prosql = Product::find($request->product_id);
        $product_name = $prosql->name;
        $cussql = Customer::find($request->customer_id);
        $customer_name = $cussql->name;
        // dd($product_name);
        $cominfo = new StockOut;
        $cominfo->customer_id = $request->customer_id;
        $cominfo->customer_name = $customer_name;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Stock Out Info",$this->moduleName." Added Successfully.");
        return redirect('stock_out')->with('status', 'Stock Out Type Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = StockOut::find($id);
        $json = $this->StockOutParseData();
        $pro = Product::all();
        $cus = Customer::all();
        return view('apps.pages.oparetion.stock_out',
            [
                'data'=>$data,
                'json'=>$json,
                'pro'=>$pro,
                'cus'=>$cus,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function edit(StockOut $stockOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prosql = Product::find($request->product_id);
        $product_name = $prosql->name;
        $cussql = Customer::find($request->customer_id);
        $customer_name = $cussql->name;
        $cominfo = StockOut::find($id);
        $cominfo->customer_id = $request->customer_id;
        $cominfo->customer_name = $customer_name;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Stock Out Info",$this->moduleName." Updated Successfully.");
        return redirect('stock_out')->with('status', 'Stock Out Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = StockOut::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
