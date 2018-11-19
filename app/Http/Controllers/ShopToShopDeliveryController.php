<?php

namespace App\Http\Controllers;

use App\ShopToShopDelivery;
use App\Product;
use App\ShopInfo;
use Illuminate\Http\Request;
use DB;
class ShopToShopDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Shop To Shop Delivery Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $pro = Product::all();
        $ShopInfo = ShopInfo::all();
        $json = $this->ShopToShopDeliveryData();
        // dd($json);
        return view('apps.pages.oparetion.shop_to_shop_deliverie',
            [
                'json'=>$json,
                'pro'=>$pro,
                'ShopInfo'=>$ShopInfo,
            ]
        );       
    }
    private function ShopToShopDeliveryData() {
        $json = DB::table('shop_to_shop_deliveries')
                ->leftjoin('products', 'shop_to_shop_deliveries.product_id', '=', 'products.id')
                ->select('shop_to_shop_deliveries.*', 'products.name as proname',DB::raw('(select spos_shop_infos.branch_name from spos_shop_infos where spos_shop_infos.id=spos_shop_to_shop_deliveries.from_shop_id) as from_shop_name'),DB::raw('(select spos_shop_infos.branch_name from spos_shop_infos where spos_shop_infos.id=spos_shop_to_shop_deliveries.to_shop_id) as to_shop_name'))
                ->orderBy('shop_to_shop_deliveries.id', 'DESC')
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
            'from_shop_id' => 'required',
            'to_shop_id' => 'required',
            'barcode' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $prosql = Product::find($request->product_id);
        $product_name = $prosql->name;
        $shopsql = ShopInfo::find($request->from_shop_id);
        $frombranch_name = $shopsql->branch_name;
        $shopsql = ShopInfo::find($request->to_shop_id);
        $tobranch_name = $shopsql->branch_name;
        // dd($tobranch_name);
        $cominfo = new ShopToShopDelivery;
        $cominfo->from_shop_id = $request->from_shop_id;
        $cominfo->from_shop_name = $frombranch_name;
        $cominfo->to_shop_id = $request->to_shop_id;
        $cominfo->to_shop_name = $tobranch_name;
        $cominfo->barcode = $request->barcode;
        $cominfo->product_id = $request->product_id;
        $cominfo->product_name = $product_name;
        $cominfo->quantity = $request->quantity;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Shop To Shop Delivery Info",$this->moduleName." Added Successfully.");
        return redirect('shop_to_shop_deliverie')->with('status', 'Shop To Shop Delivery Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopToShopDelivery  $shopToShopDelivery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ShopToShopDelivery::find($id);
        // dd($data);
        $json = $this->ShopToShopDeliveryData();
        $pro = Product::all();
        $ShopInfo = ShopInfo::all();
        
        return view('apps.pages.oparetion.shop_to_shop_deliverie',
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
     * @param  \App\ShopToShopDelivery  $shopToShopDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopToShopDelivery $shopToShopDelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopToShopDelivery  $shopToShopDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = ShopToShopDelivery::find($id);
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

        $this->sdc->log("Shop To Shop Delivery Info",$this->moduleName." Updated Successfully.");
        return redirect('shop_to_shop_deliverie')->with('status', 'Shop To Shop Delivery Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopToShopDelivery  $shopToShopDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = ShopToShopDelivery::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
