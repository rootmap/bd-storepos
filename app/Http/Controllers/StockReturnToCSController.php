<?php

namespace App\Http\Controllers;

use App\StockReturnToCS;
use App\Product;
use App\ShopInfo;
use Illuminate\Http\Request;
use DB;
class StockReturnToCSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Stock Return To CS Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $pro = Product::all();
        $ShopInfo = ShopInfo::all();
        $json = $this->StockReturnToCSData();
        // dd($json);
        return view('apps.pages.oparetion.stock_return_to_cs',
            [
                'json'=>$json,
                'pro'=>$pro,
                'ShopInfo'=>$ShopInfo,
            ]
        );       
    }
    private function StockReturnToCSData() {
        $json = DB::table('stock_return_to_c_s')
                ->leftjoin('products', 'stock_return_to_c_s.product_id', '=', 'products.id')
                ->select('stock_return_to_c_s.*', 'products.name as proname',DB::raw('(select spos_shop_infos.branch_name from spos_shop_infos where spos_shop_infos.id=spos_stock_return_to_c_s.from_shop_id) as from_shop_name'),DB::raw('(select spos_shop_infos.branch_name from spos_shop_infos where spos_shop_infos.id=spos_stock_return_to_c_s.to_shop_id) as to_shop_name'))
                ->orderBy('stock_return_to_c_s.id', 'DESC')
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
        // dd($request->to_shop_id);
        $this->validate($request, [
            'from_shop_id' => 'required',
            'to_shop_id' => 'required',
            'barcode' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $prosql = Product::find($request->product_id);
        $product_name = $prosql->name;
        
        $cominfo = new StockReturnToCS;
        $cominfo->from_shop_id = $request->from_shop_id;
        $cominfo->to_shop_id = $request->to_shop_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Stock Return To CS Info",$this->moduleName." Added Successfully.");
        return redirect('stock_return_to_cs')->with('status', 'Stock Return To CS Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockReturnToCS  $stockReturnToCS
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = StockReturnToCS::find($id);
        // dd($data);
        $json = $this->StockReturnToCSData();
        $pro = Product::all();
        $ShopInfo = ShopInfo::all();
        return view('apps.pages.oparetion.stock_return_to_cs',
            [
                'data'=>$data,
                'json'=>$json,
                'pro'=>$pro,
                'ShopInfo'=>$ShopInfo,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockReturnToCS  $stockReturnToCS
     * @return \Illuminate\Http\Response
     */
    public function edit(StockReturnToCS $stockReturnToCS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockReturnToCS  $stockReturnToCS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = StockReturnToCS::find($id);
        $cominfo->from_shop_id = $request->from_shop_id;
        $cominfo->to_shop_id = $request->to_shop_id;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Stock Return To CS Info",$this->moduleName." Updated Successfully.");
        return redirect('stock_return_to_cs')->with('status', 'Stock Return To CS Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockReturnToCS  $stockReturnToCS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = StockReturnToCS::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
