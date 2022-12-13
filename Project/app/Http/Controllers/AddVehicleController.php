<?php

namespace App\Http\Controllers;

use App\Models\AddVehicle;
use App\Http\Requests\StoreAddVehicleRequest;
use App\Http\Requests\UpdateAddVehicleRequest;
use Illuminate\Http\Request;
class AddVehicleController extends Controller
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
     * @param  \App\Http\Requests\StoreAddVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddVehicleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddVehicle  $addVehicle
     * @return \Illuminate\Http\Response
     */
    public function show(AddVehicle $addVehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddVehicle  $addVehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(AddVehicle $addVehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddVehicleRequest  $request
     * @param  \App\Models\AddVehicle  $addVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddVehicleRequest $request, AddVehicle $addVehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddVehicle  $addVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddVehicle $addVehicle)
    {
        //
    }
    public function AddVehicle(){
        return view('AddVehicle');
    }

    public function AddVehicleSubmit(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $p = new AddVehicle();
        $p->id=$request->id;
        $p->VehicleName=$request->VehicleName;
        $p->Type=$request->Type;
        $p->image=$request->image;
        $p->StartingPoint=$request->StartingPoint;
        $p->FinishingPoint=$request->FinishingPoint;
        $p->TotalSeat=$request->TotalSeat;
        $p->Price=$request->Price;
        $p->ExtraInfo=$request->ExtraInfo;

        if($request->hasFile('image')){
            $imageName = time()."_".$request->file('image')->getClientOriginalName();
            // return $imageName;
            $request->image->move(public_path('images'), $imageName);
            $p->image=$imageName;
            $p->save();
            return("Done");
            //return redirect(route('products.list'));
        }

        /* Store $imageName name in DATABASE from HERE */
        return "No file";
    }


    public function ShowVehicle(){

        $products = AddVehicle::all();
        return view('ShowVehicle')->with('products',$products);

    }

    public function MyVehicle(){

        $products = AddVehicle::all();
        return view('MyVehicle')->with('products',$products);

    }


    public function BuyTicket(){
        $products = AddVehicle::all();
        return view('BuyTicketInfo')->with('products',$products);
    }



   //////////////////////////////////////////////////////////////////////////////////////////////////////
    public function VehicleEdit(Request $request){
        $products = AddVehicle::where('id', $request->id)->first();
        // return $student;
        return view('AddVehicleEdit')->with('products', $products);
        // return view('student.studentCreate')->with('student', $student);
    }
    public function VehicleEditSubmitted(Request $request){
        $products = AddVehicle::where('id', $request->id)->first();
        // return  $student;
        $products->VehicleName = $request->VehicleName;
        $products->id = $request->id;
        $products->Type=$request->Type;
        $products->StartingPoint=$request->StartingPoint;
        $products->FinishingPoint=$request->FinishingPoint;
        $products->TotalSeat=$request->TotalSeat;

        $products->save();
        return redirect()->route('MyVehicle');

    }

    public function VehicleDelete(Request $request){
        $s = AddVehicle::where('id', $request->id)->first();
        $s->delete();

        return redirect()->route('MyVehicle');
    }


    public function AddVehicles(){


        return AddVehicle::all();
    }

    public function AddVehicleSubmits(Request $request){


        $p = new AddVehicle();
        $p->id=$request->id;
        $p->VehicleName=$request->VehicleName;
        $p->Type=$request->Type;
        $p->image=$request->file('image')->store('FileImages') ;
        $p->StartingPoint=$request->StartingPoint;
        $p->FinishingPoint=$request->FinishingPoint;
        $p->TotalSeat=$request->TotalSeat;
        $p->Price=$request->Price;
        $p->ExtraInfo=$request->ExtraInfo;
        $p->save();
        if($p == true){
           
        
        return $p ;
        }
        else{
            echo "input not valid";
        }


    }
}
