<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Vendor Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        return view('apps.pages.setup.vendor.vendor');
    }
    public function VendorList()
    {
        $data = Vendor::all();
        // dd($data);
        return view('apps.pages.setup.vendor.vendor-list',['data'=>$data]);
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
            'contact_person' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'website' => 'required',
            'address' => 'required',
        ]);

        $cominfo = new Vendor;
        $cominfo->name = $request->name;
        $cominfo->contact_person = $request->contact_person;
        $cominfo->contact_number = $request->contact_number;
        $cominfo->email = $request->email;
        $cominfo->website = $request->website;
        $cominfo->address = $request->address;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Vendor Info",$this->moduleName." Added Successfully.");
        return redirect('vendor')->with('status', 'Vendor Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Vendor::find($id);
        return view('apps.pages.setup.vendor.vendor',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = Vendor::find($id);
        $cominfo->name = $request->name;
        $cominfo->contact_person = $request->contact_person;
        $cominfo->contact_number = $request->contact_number;
        $cominfo->email = $request->email;
        $cominfo->website = $request->website;
        $cominfo->address = $request->address;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Vendor Info",$this->moduleName." Updated Successfully.");
        return redirect('vendor')->with('status', 'Vendor Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Vendor::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
