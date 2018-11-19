<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Auth;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Customer Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        return view('apps.pages.sales.customer.customer');
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cominfo = new Customer;
        $cominfo->name = $request->name;
        $cominfo->email = $request->email;
        $cominfo->phone = $request->phone;
        $cominfo->address = $request->address;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

        $this->sdc->log("Customer Info",$this->moduleName." Added Successfully.");
        return redirect('customer')->with('status', 'Customer Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function CustomerList(){
        $json = Customer::all();
        return view('apps.pages.sales.customer.customer-list',['data'=>$json]);
    }

    public function show($id)
    {
        $json = Customer::find($id);
        return view('apps.pages.sales.customer.customer',['data'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = Customer::find($id);
        $cominfo->name = $request->name;
        $cominfo->email = $request->email;
        $cominfo->phone = $request->phone;
        $cominfo->address = $request->address;
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Customer Info",$this->moduleName." Updated Successfully.");
        return redirect('customer')->with('status', 'Customer Updated Successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Customer::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
