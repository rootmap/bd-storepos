<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;
class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleName="Company Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $com=CompanyInfo::orderBy('id','DESC')->first();
        // dd($com);
        if(count($com)!=0)
        {
            return view('apps.pages.setup.company_info',['data'=>$com]);
        }
        else
        {
            return view('apps.pages.setup.company_info',['data'=>array()]);
        }
    }

    public function logout()
    {
        $this->sdc->log("Logout","Logout Successfully.");
        \Auth::logout();
        return redirect('login')->with('status','Logout Successfully');
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
        // echo 1; die();
        $this->validate($request, [
            'company_name' => 'required',
            'logo' => 'required',
            'email' => 'required',
        ]);
       // echo $request->logo;
       // exit();
        $filename = "";
        if (!empty($request->file('logo'))) {
            $img = $request->file('logo');
            $upload = 'upload/setup';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        // dd($filename);
        $cominfo = new CompanyInfo;
        $cominfo->store_id = $request->store_id;
        $cominfo->company_name = $request->company_name;
        $cominfo->logo = $filename;
        $cominfo->email = $request->email;
        $cominfo->phone_no = $request->phone_no;
        $cominfo->address = $request->address;
        $cominfo->vat_no = $request->vat_no;
        $cominfo->company_reg_no = $request->company_reg_no;
        $cominfo->save();
        $this->sdc->log("Company Info",$this->moduleName." Added Successfully.");
        return redirect('company_info')->with('status', 'Company Info Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filename = $request->eximage;
        // echo $filename; print_r($request->eximage); die();
        if (!empty($request->file('logo'))) {
            $img = $request->file('logo');
            $upload = 'upload/setup';
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
            @unlink($upload . '/' . $request->eximage);
        }
        $cominfo = CompanyInfo::find($id);
        $cominfo->store_id = $request->store_id;
        $cominfo->company_name = $request->company_name;
        $cominfo->logo = $filename;
        $cominfo->email = $request->email;
        $cominfo->phone_no = $request->phone_no;
        $cominfo->address = $request->address;
        $cominfo->vat_no = $request->vat_no;
        $cominfo->company_reg_no = $request->company_reg_no;
        $cominfo->save();
        $this->sdc->log("Company Info",$this->moduleName."Updated Successfully.");
        return redirect('company_info')->with('status', 'Company Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyInfo $companyInfo)
    {
        //
    }
}
