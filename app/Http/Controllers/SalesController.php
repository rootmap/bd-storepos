<?php

namespace App\Http\Controllers;

use App\Sales;
use App\Invoice;
use App\Vat;
use App\Discount;
use App\Customer;
use App\InvoiceProduct;
use App\InvoicePayment;
use App\Cart;
use App\Tender;
use Illuminate\Http\Request;
use DB;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Sales";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index(Request $request)
    {
        $stock = DB::table('products')
                ->leftjoin('brands','products.brand_id','=','brands.id')
                ->leftjoin('brand_models','products.model_id','=','brand_models.id')
                ->select('products.*','brands.name as brand_name','brand_models.name as model_name', DB::raw('COUNT(spos_products.brand_id) as total'))
                ->groupBy('products.brand_id')
                ->get();

        $pro = DB::table('products')
                 ->leftjoin('brands','products.brand_id','=','brands.id')
                 ->leftjoin('brand_models','products.model_id','=','brand_models.id')
                 ->select('products.*','brands.name as brand_name','brand_models.name as model_name')
                 ->get();

        $cus = Customer::all();
        $tender = Tender::all();
        $vatCheck = Vat::all();
        $tax_rate=0;
        if(count($vatCheck)>0)
        {
            $vat= Vat::find(1);
            $tax_rate=$vat->rate_amount;    
        }

        $discountCheck = Discount::all();
        $discount_type=0;
        $discount_rate=0;
        if(count($vatCheck)>0)
        {
            $dis= Discount::find(1);
            $discount_type=$dis->discount_type_id;
            $discount_rate=$dis->price;
        }



        $oldCart = $request->session()->has('Pos') ?  $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);

        // dd($stock);
        return view('apps.pages.sales.sales',
            [
                'stock'=>$stock,
                'cus'=>$cus,
                'tax_rate'=>$tax_rate,
                'discount_type'=>$discount_type,
                'discount_rate'=>$discount_rate,
                'cart'=>$cart,
                'pro'=>$pro,
                'tender'=>$tender
            ]);
    }
    public function loadedProduct(Request $request)
    {
        $code = $request->code;
        // dd($code);
        $jsoncount = DB::table('products')
                ->leftjoin('brands','products.brand_id','=','brands.id')
                ->leftjoin('brand_models','products.model_id','=','brand_models.id')
                ->select('products.*','brands.name as brand_name','brand_models.name as model_name')
                ->where('products.barcode','=',$code)
                ->count();
        $json = DB::table('products')
                ->leftjoin('brands','products.brand_id','=','brands.id')
                ->leftjoin('brand_models','products.model_id','=','brand_models.id')
                ->select('products.*','brands.name as brand_name','brand_models.name as model_name')
                ->where('products.barcode','=',$code)
                ->first();

        $dataArray=array('total'=>$jsoncount,'datas'=>$json);
        // dd($json);
        return response()->json($dataArray);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        $data=Invoice::orderBy('id','DESC')->get();
        return view('apps.pages.sales.invoice-list',['data'=>$data]);
        //dd($data);
    }

    public function InvoiceShow(Request $request,$salesid=0)
    {
        //dd(1);
        $data=Invoice::where('id',$salesid)->first();
        $customerInfo=Customer::where('id',$data->customer_id)->first();
        $invoiceProduct=InvoiceProduct::where('invoice_id',$data->invoice_id)->get();
        $invoicePayment=invoicePayment::where('invoice_id',$data->invoice_id)->get();
        $storeInfo=$this->sdc->storeInfo();
        return view('apps.pages.sales.view-invoice',['invoice'=>$data,'storeInfo'=>$storeInfo,'invoice_product'=>$invoiceProduct,'invoice_payment'=>$invoicePayment,'customerInfo'=>$customerInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
