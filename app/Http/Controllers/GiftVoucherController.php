<?php

namespace App\Http\Controllers;

use App\GiftVoucher;
use Illuminate\Http\Request;

class GiftVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Gift Voucher Info";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        $json = GiftVoucher::all();
        // dd($json);
        return view('apps.pages.oparetion.gift_voucher',
            [
                'json'=>$json,
            ]
        );       
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
            'gift_voucher_name' => 'required',
            'gift_voucher_code' => 'required',
            'amount' => 'required',
        ]);

        $cominfo = new GiftVoucher;
        $cominfo->gift_voucher_name = $request->gift_voucher_name;
        $cominfo->gift_voucher_code = $request->gift_voucher_code;
        $cominfo->amount = $request->amount;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();

       

        $this->sdc->log("Gift Voucher Info",$this->moduleName." Added Successfully.");
        return redirect('gift_voucher')->with('status', 'Gift Voucher Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = GiftVoucher::all();
        $data = GiftVoucher::find($id);
        return view('apps.pages.oparetion.gift_voucher',['data'=>$data,'json'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftVoucher $giftVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GiftVoucher  $giftVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cominfo = GiftVoucher::find($id);
        $cominfo->gift_voucher_name = $request->gift_voucher_name;
        $cominfo->gift_voucher_code = $request->gift_voucher_code;
        $cominfo->amount = $request->amount;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();
        // echo $this->moduleName; die();
        $this->sdc->log("Gift Voucher Info",$this->moduleName." Updated Successfully.");
        return redirect('gift_voucher')->with('status', 'Gift Voucher Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GiftVoucher  $giftVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = GiftVoucher::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
