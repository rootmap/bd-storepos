<?php

namespace App\Http\Controllers;

use App\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Tender Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $json = Tender::all();
        return view('apps.pages.setup.tender',['json'=>$json]);       
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

        $cominfo = new Tender;
        $cominfo->name = $request->name;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Tender Info",$this->moduleName." Added Successfully.");
        return redirect('tender')->with('status', 'Tender Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = Tender::all();
        $data = Tender::find($id);
        return view('apps.pages.setup.tender',['data'=>$data,'json'=>$json]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function edit(Tender $tender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = Tender::find($id);
        $cominfo->name = $request->name;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Tender Info",$this->moduleName." Updated Successfully.");
        return redirect('tender')->with('status', 'Tender Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Tender::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
