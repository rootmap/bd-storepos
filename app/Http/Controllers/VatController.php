<?php

namespace App\Http\Controllers;

use App\Vat;
use Illuminate\Http\Request;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Tax Management";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $json = Vat::all();
        $retArray=['json'=>$json];
        if(count($json)>0)
        {
            $data = Vat::find(1);
            $retArray=['data'=>$data,'json'=>$json];
        }
        return view('apps.pages.setup.tax',$retArray);       
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
        ]);

        $cominfo = new Vat;
        $cominfo->name = $request->name;
        $cominfo->rate_amount = $request->rate_amount;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("tax Info",$this->moduleName." Added Successfully.");
        return redirect('tax')->with('status', 'Tax Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function show(Vat $vat)
    {
        $json = Vat::all();
        $data = Vat::find($id);
        return view('apps.pages.setup.tax',['data'=>$data,'json'=>$json]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function edit(Vat $vat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vat $vat,$id=0)
    {
        $cominfo = Vat::find($id);
        $cominfo->name = $request->name;
        $cominfo->rate_amount = $request->rate_amount;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("tax Info",$this->moduleName." Updated Successfully.");
        return redirect('tax')->with('status', 'Tax Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vat $vat,$id=0)
    {
        $json = Vat::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
