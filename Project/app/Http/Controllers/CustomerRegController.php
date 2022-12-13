<?php

namespace App\Http\Controllers;

use App\Models\CustomerReg;
use App\Models\userInfo;
use App\Http\Requests\StoreCustomerRegRequest;
use App\Http\Requests\UpdateCustomerRegRequest;
use Illuminate\Http\Request;
class CustomerRegController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerRegRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRegRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerReg  $customerReg
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerReg $customerReg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerReg  $customerReg
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerReg $customerReg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRegRequest  $request
     * @param  \App\Models\CustomerReg  $customerReg
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRegRequest $request, CustomerReg $customerReg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerReg  $customerReg
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerReg $customerReg)
    {
        //
    }
    public function Customer()
    {
        return view('Customer.Customer');
    }

    public function CustomerRegadd(Request $request)
    {
            $validate = $request->validate([
            "id"=>"required",
            "Name"=>"required|min:5|max:20",
            'Email'=>"email|email",
            'Password'=>'required',
            'Role'=>'required',
            'Phone_Number'=>'required',
    
        ]
    );
        $customerReg = new CustomerReg();
        $customerReg->Name= $request->Name;
        $customerReg->Email= $request->Email;
        $customerReg->Password= $request->Password;
        $customerReg->Role= $request->Role;
        $customerReg->Phone_Number= $request->Phone_Number;
        $customerReg->save();

        $user = new userInfo();
       
        $user->Email= $request->Email;
        $user->Password= $request->Password;
        $user->Role= $request->Role;
        $user->save();

        return redirect()->route('login');
    }

    public function Login(){
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
        $CustomerReg = userInfo::where('Email',$request->Email)
        ->where('Password',$request->Password)
        ->where('Role',$request->Role)
        ->first();

        if($CustomerReg->Role =='HotelAdmin'){
            $request->session()->put('user',$CustomerReg->Email);
            return redirect()->route('Dash');
           
        }
       else if($CustomerReg->Role =='Customer'){
            $request->session()->put('Email',$CustomerReg->Email);
            return redirect()->route('customerdash');
           
        }
        return redirect()->route('login');
    }
    public function Customerdash(){
        return view('Customer.Customerdash');

    }
    public function logout(){
        session()->forget('user');
        return redirect()->route('login');
    }
    
}

