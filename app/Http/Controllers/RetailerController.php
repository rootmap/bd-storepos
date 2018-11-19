<?php

namespace App\Http\Controllers;

use App\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Retailer Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        return view('apps.pages.setup.retailer.retailer');
    }
    public function RetailerList()
    {
        $data = Retailer::all();
        return view('apps.pages.setup.retailer.retailer-list',['data'=>$data]);
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
            'retailer_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'national_id_no' => 'required',
        ]);

        $cominfo = new Retailer;
        $cominfo->name = $request->name;
        $cominfo->retailer_id = $request->retailer_id;
        $cominfo->phone = $request->phone;
        $cominfo->email = $request->email;
        $cominfo->present_address = $request->present_address;
        $cominfo->permanent_address = $request->permanent_address;
        $cominfo->national_id_no = $request->national_id_no;
        $cominfo->passport_id_no = $request->passport_id_no?$request->passport_id_no:0;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Retailer Info",$this->moduleName." Added Successfully.");
        return redirect('retailer')->with('status', 'Retailer Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Retailer::find($id);
        return view('apps.pages.setup.retailer.retailer',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Retailer $retailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = Retailer::find($id);
        $cominfo->name = $request->name;
        $cominfo->retailer_id = $request->retailer_id;
        $cominfo->phone = $request->phone;
        $cominfo->email = $request->email;
        $cominfo->present_address = $request->present_address;
        $cominfo->permanent_address = $request->permanent_address;
        $cominfo->national_id_no = $request->national_id_no;
        $cominfo->passport_id_no = $request->passport_id_no?$request->passport_id_no:0;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Retailer Info",$this->moduleName." Updated Successfully.");
        return redirect('retailer')->with('status', 'Retailer Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Retailer::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
