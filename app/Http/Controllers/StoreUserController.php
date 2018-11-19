<?php

namespace App\Http\Controllers;

use App\StoreUser;
use App\User;
use Illuminate\Http\Request;
use DB;
use Hash;
use DateTime;
use Illuminate\Support\Facades\Input;
class StoreUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="User";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    public function index()
    {
        return view('apps.pages.setup.user.user');
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
            'photo' => 'required',
            'user_type' => 'required',
            'password'         => 'required',
            'password_confirm' => 'required|same:password'
        ]);
       // echo $request->is_active;
       // exit();
        $user = User::where('email', '=', Input::get('email'))->get();
        if(count($user) > 0)
        {
            return redirect('user')->with('error', 'User Alredy exists!');
        }
        else{
            $filename = "";
            if (!empty($request->file('photo'))) {
                $img = $request->file('photo');
                $upload = 'upload/setup/user';
                $filename = time() . "." . $img->getClientOriginalExtension();
                $success = $img->move($upload, $filename);
            }
            $cominfo = new StoreUser;
            $cominfo->name = $request->name;
            $cominfo->photo = $filename;
            $cominfo->email = $request->email;
            $cominfo->password = Hash::make($request->password);
            $cominfo->phone = $request->phone;
            $cominfo->address = $request->address;
            $cominfo->user_type = $request->user_type;
            $cominfo->is_lock = $request->is_lock ? $request->is_lock:0;
            $cominfo->is_active = $request->is_active ? $request->is_active:0;
            $cominfo->store_id=$this->sdc->storeID();
            $cominfo->branch_id=$this->sdc->branchID();
            $cominfo->created_by=$this->sdc->UserID();
            $cominfo->save();

            DB::table('users')->insert(
                 array(
                       'name'=>$request->name,
                       'email'=>$request->email,
                       'password'=>Hash::make($request->password),
                       'user_type'=>$request->user_type,
                       'remember_token'=>$request->_token,
                       'created_at'=> new DateTime(),
                 )
            );

            $this->sdc->log("User Info",$this->moduleName." Added Successfully.");
            return redirect('user')->with('status', 'User Added Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoreUser  $storeUser
     * @return \Illuminate\Http\Response
     */

    public function userList(){
        $json = StoreUser::all();
        return view('apps.pages.setup.user.user-list',['data'=>$json]);
    }

    public function show($id)
    {
        $json = StoreUser::find($id);
        return view('apps.pages.setup.user.user',['data'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoreUser  $storeUser
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreUser $storeUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoreUser  $storeUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'user_type' => 'required',
            'password'         => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        $filename = $request->eximage;
        // echo $filename; print_r($request->eximage); die();
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/setup/user';
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
            @unlink($upload . '/' . $request->eximage);
        }
        $cominfo = StoreUser::find($id);
        $cominfo->name = $request->name;
        $cominfo->photo = $filename;
        $cominfo->email = $request->email;
        $cominfo->password = Hash::make($request->password);
        $cominfo->phone = $request->phone;
        $cominfo->address = $request->address;
        $cominfo->user_type = $request->user_type;
        $cominfo->is_lock = $request->is_lock ? $request->is_lock:0;
        $cominfo->is_active = $request->is_active ? $request->is_active:0;
        $cominfo->store_id=$this->sdc->storeID();
        $cominfo->branch_id=$this->sdc->branchID();
        $cominfo->created_by=$this->sdc->UserID();
        $cominfo->save();


        $user_email = $request->email;
        
        $userinfo = User::where('email','=',$user_email)->first();;
        // dd($userinfo);
        $userinfo->name = $request->name;
        $userinfo->password = Hash::make($request->password);
        $userinfo->user_type = $request->user_type;
        $userinfo->remember_token = $request->_token;
        $userinfo->created_at = new DateTime();
        $userinfo->save();
       
        // DB::table('users')->update(
        //      array(
        //            'name'=>$request->name,
        //            'password'=>Hash::make($request->password),
        //            'user_type'=>$request->user_type,
        //            'remember_token'=>$request->_token,
        //            'created_at'=> new DateTime(),
        //      )
        // );
        $this->sdc->log("User Info",$this->moduleName." Updated Successfully.");
        return redirect('user')->with('status', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoreUser  $storeUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
