<?php

namespace App\Http\Controllers;

use App\Models\Hotelreg;
use App\Models\CustomerReg;
use App\Models\userInfo;
use App\Models\Token;
use App\Http\Requests\StoreHotelregRequest;
use App\Http\Requests\UpdateHotelregRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DateTime;

class HotelregController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreHotelregRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelregRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotelreg  $hotelreg
     * @return \Illuminate\Http\Response
     */
    public function show(Hotelreg $hotelreg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotelreg  $hotelreg
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotelreg $hotelreg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelregRequest  $request
     * @param  \App\Models\Hotelreg  $hotelreg
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelregRequest $request, Hotelreg $hotelreg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotelreg  $hotelreg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotelreg $hotelreg)
    {
        //
    }
    public function Hotelreg()
    {
        return view('Hotelreg.Hotelreg');
    }

    public function Hotelregadd(Request $request)
    {
            $validate = $request->validate([
            "id"=>"required",
            "Hotel_Name"=>"required|min:5|max:20",
            'Email'=>"email|email",
            'Password'=>'required',
            'Role'=>'required',
            'Type'=>'required',
            'Place'=>'required',
            'Address'=>'required',
            'Phone_Number'=>'required',
    
        ]
    );
        $hotelreg = new Hotelreg();
        $hotelreg->Hotel_Name= $request->Hotel_Name;
        $hotelreg->Email= $request->Email;
        $hotelreg->Password= $request->Password;
        $hotelreg->Role= $request->Role;
        $hotelreg->Type= $request->Type;
        $hotelreg->Place= $request->Place;
        $hotelreg->Address= $request->Address;
        $hotelreg->Phone_Number= $request->Phone_Number;
        $hotelreg->save();
        return $request;
        $user = new userInfo();
       
        $user->Email= $request->Email;
        $user->Password= $request->Password;
        $user->Role= $request->Role;
        $user->save();
        return redirect()->route('login');
    }

    public function Loginadd(){
        return view('Hotelreg.login');
    }
    public function loginSubmit(Request $request){
        $roles= [
            'Email' => 'required',
            'Role' => 'required',
            'Password'=> 'required',
            
        ];
        $messages= [
            'required'=> 'Please Fill-Up the Field',
            'password.min' => 'Minimum 6 Character'
        ];
        $this->validate($request,$roles,$messages);
        $Hotelreg = userInfo::where('Email',$request->Email)
        ->where('Password',$request->Password)
        ->where('Role',$request->Role)
        ->first();
       


        if($Hotelreg->Role =='HotelAdmin'){
            $request->session()->put('user',$Hotelreg->Email);
            return redirect()->route('Dash');
           
        }
       else if($Hotelreg->Role =='Customer'){
            $request->session()->put('Email',$Hotelreg->Email);
            return redirect()->route('customerdash');
           
        }

        return redirect()->route('login');
    }
    public function Dash(){
        return view('Hotelreg.Dash');

    }
    // public function logout(){
    //     session()->forget('user');
    //     return redirect()->route('login');
    // }

    ///api
    public function List(){
        return Hotelreg::all();
    }
    public function addHotelreg(Request $request)
    {
        $hotelreg = new Hotelreg();
        $hotelreg->Hotel_Name= $request->Hotel_Name;
        $hotelreg->Email= $request->Email;
        $hotelreg->Password= $request->Password;
        $hotelreg->Role= $request->Role;
        $hotelreg->Type= $request->Type;
        $hotelreg->Place= $request->Place;
        $hotelreg->Address= $request->Address;
        $hotelreg->Phone_Number= $request->Phone_Number;
        $hotelreg->save();
        return $request;
        $user = new userInfo();
       
        $user->Email= $request->Email;
        $user->Password= $request->Password;
        $user->Role= $request->Role;
        $user->save();
        
        $message="user successfully added";
        return $message;
    }
    public function  login(Request $request){
     
        $Hotelreg = Hotelreg::where('Email',$request->Email)
        ->where('Password',$request->Password)
        ->first();
        if($Hotelreg){
            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $Hotelreg->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
        return "No user found";

    }
    public function  logout(Request $req){

        $token = Token::where('token',$req->token)->first();
        if($token){
            $token->expired_at =new DateTime();
            $token->save();
            return $token;
        }
}
}