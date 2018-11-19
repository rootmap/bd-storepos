<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Invoice;
use App\Product;
use App\Customer;
use App\Tender;
use App\InvoiceProduct;
use App\InvoicePayment;
use DB;
use Auth;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddToCart(Request $request) {

        $pid=$request->pid;
        if($pid>0)
        {
            //$product = Product::find($pid);
            $product = DB::table('products')
                 ->leftjoin('brands','products.brand_id','=','brands.id')
                 ->leftjoin('brand_models','products.model_id','=','brand_models.id')
                 ->select('products.*','brands.name as brand_name','brand_models.name as model_name')
                 ->where('products.id',$pid)
                 ->first();
            $oldCart = $request->session()->has('Pos') ?  $request->session()->get('Pos') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $pid);
            $request->session()->put('Pos', $cart);
            return response()->json(1);
        }
        else
        {
            return response()->json(0);
        }
        
    }

    public function getCustomQuantityToCart(Request $request, $pid,$quantity) {

        $product = Product::find($pid);
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->addCustomQuantity($product, $product->id,$quantity);
        $request->session()->put('Pos', $cart);
        return response()->json(1);

    }

    public function changeCartQuantity(Request $request) {

        $product = Product::find($request->pid);
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->addCustomQuantity($product, $product->id,$request->quantity);
        $request->session()->put('Pos', $cart);
        return response()->json(1);

    }

    public function changeCartCustomer(Request $request) {

        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->addCustomerID($request->customer_id);
        $request->session()->put('Pos', $cart);
        return response()->json(1);

    }

    public function cartCreateInvoice(Request $request) {

        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);

        if($request->customer_id=="A00")
        {
            $customer_info=new Customer;
            $customer_info->name=$request->customer_name;
            $customer_info->phone=$request->customer_phone;
            $customer_info->email=$request->customer_email;
            $customer_info->address=$request->customer_address;
            $customer_info->created_by=Auth::user()->id;
            $customer_info->save();

        }
        else
        {
            $customer_info=Customer::find($request->customer_id);
        }

        $cash_received=0;
        if($request->payment_id==1)
        {
            $cash_received=$request->cash_received;
        }
        elseif($request->payment_id==2)
        {
            $cash_received=$request->card_payment_amount;
        }
        else
        {
            $cash_received=$request->mobile_receive_amount;
        }



        
        $tender_info=Tender::find($request->payment_id);

        $totalPrice=0;
        $totalcost=0;
        if(count($cart->items)>0)
        {
            foreach($cart->items as $row):
                $totalPrice+=$row['unitprice']*$row['qty'];
                $totalcost+=$row['item']->cost*$row['qty'];
            endforeach;
        }

        $totalAMount=($totalPrice+$cart->totalTax)-$cart->discountTotal;
        $totalProfit=$totalAMount-$totalcost;
        //echo $totalcost; die();

        $change_amount=$cash_received-$totalAMount;

        $inv=new Invoice;
        $inv->invoice_id=time();
        $inv->customer_id=$request->customer_id;
        $inv->customer_name=$customer_info->name;
        $inv->tender_id=$request->payment_id;
        $inv->tender_name=$tender_info->name;
        $inv->discount_type=$cart->discount_type;
        $inv->discount_rate=$cart->sales_discount;
        $inv->discount_amount=$cart->discountTotal;
        $inv->tax_rate=$cart->TaxRate;
        $inv->total_tax=$cart->totalTax;
        $inv->total_amount=$totalAMount;
        $inv->total_cost=$totalcost;
        $inv->total_profit=$totalProfit;
        $inv->created_by=Auth::user()->id;
        $inv->created_by_name=Auth::user()->name;
        $inv->save();
        $invoice_id=$inv->invoice_id;


        if(count($cart->items)>0)
        {
            foreach($cart->items as $row):
                $invPro=new InvoiceProduct;
                $invPro->invoice_id=$invoice_id;
                $invPro->product_id=$row['item']->id;
                $invPro->product_name=$row['item']->name;
                $invPro->price=$row['item']->price;
                $invPro->cost=$row['item']->cost;
                $invPro->quantity=$row['qty'];
                $invPro->total_price=$row['unitprice']*$row['qty'];
                $invPro->total_cost=$row['item']->cost*$row['qty'];
                $invPro->created_by=Auth::user()->id;
                $invPro->created_by_name=Auth::user()->name;
                $invPro->save();
            endforeach;
        }

        $invPayment=new InvoicePayment;
        $invPayment->invoice_id=$invoice_id;
        $invPayment->customer_id=$request->customer_id;
        $invPayment->customer_name=$customer_info->name;
        $invPayment->tender_id=$request->payment_id;
        $invPayment->tender_name=$tender_info->name;
        $invPayment->invoice_amount=$totalAMount;
        $invPayment->paid_amount=$cash_received;
        $invPayment->change_amount=$change_amount;
        $invPayment->created_by=Auth::user()->id;
        $invPayment->created_by_name=Auth::user()->name;
        $invPayment->save();

        $cart->ClearCart();
        $request->session()->put('Pos', $cart);
        if(isset($request->print))
        {
            return response()->json(2);
        }
        else
        {
            return response()->json(1);
        }
    }

    public function changePaymentMethod(Request $request) {

        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->addPaymentID($request->payment_id);
        $request->session()->put('Pos', $cart);
        return response()->json(1);

    }

    public function getAssignDiscountToCart(Request $request)
    {
        $discountType=$request->discount_type?$request->discount_type:0;
        $discount_amount=$request->discount_amount?$request->discount_amount:0;
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->getAssignDiscountToCart($discountType,$discount_amount);
        $request->session()->put('Pos', $cart);
        return response()->json(1);
    }    

    public function changeDiscountType(Request $request)
    {
        $discountType=$request->discount_type?$request->discount_type:0;
        $discount_amount=$request->discount_amount?$request->discount_amount:0;
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->getAssignDiscountToCart($discountType,$discount_amount);
        $request->session()->put('Pos', $cart);
        return response()->json(1);
    }

   public function getCusAssignToCart(Request $request,$cusid)
   {
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->addCustomerID($cusid);
        $request->session()->put('Pos', $cart);
        return response()->json(1);
   }

    public function getPaidCart(Request $request) {

        $paidAmount=$request->paidAmount;
        $paymentID=$request->paymentID;
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->addPayment($paidAmount, $paymentID);
        $request->session()->put('Pos', $cart);
            return response()->json(1);
    }

    public function getCart(Request $request) {
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        return response()->json($oldCart);
    }

    public function clearCart(Request $request) {
        $oldCart = $request->session()->has('Pos') ? $request->session()->get('Pos') : null;
        $cart = new Cart($oldCart);
        $cart->ClearCart();
        $request->session()->put('Pos', $cart);
        return response()->json(1);
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
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
