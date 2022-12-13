<?php

namespace App\Http\Controllers;

use App\Models\CustomerReview;
use App\Http\Requests\StoreCustomerReviewRequest;
use App\Http\Requests\UpdateCustomerReviewRequest;
use Illuminate\Http\Request;
class CustomerReviewController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerReview  $customerReview
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerReview $customerReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerReview  $customerReview
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerReview $customerReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerReviewRequest  $request
     * @param  \App\Models\CustomerReview  $customerReview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerReviewRequest $request, CustomerReview $customerReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerReview  $customerReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerReview $customerReview)
    {
        //
    }
    public function Customerdashboard(){
        return view('Customer.Customerdashboard');
    }

    public function Addcomplain(){
        return view('Customer.Addcomplain');
    }

    public function AddcomplainSubmit(Request $request){
       
     
     
     
           $admin = new CustomerReview();
           $admin->hotel= $request->hotel;
           $admin->complain= $request->complain;
           
           $admin->save();
          // return "ok";
          return redirect()->route('Addcomplain'); 
          //redirect()->route('teacherList');
       }

     public function Complainlist(){
    $Admins = CustomerReview::all(); 
    $Admins = CustomerReview::paginate(3);
    return view('Customer.Complainlist')->with('Admins', $Admins);
    
    }
    public function CustomerReviewapi(){
        return CustomerReview::all();
      }
      public function CustomerReviewapipost(Request $request){
        $admin = new CustomerReview();
               $admin->id= $request->id;
               $admin->hotel= $request->hotel;
               $admin->complain= $request->complain;   
               $admin->save();
               return $request;
      }
    
}
