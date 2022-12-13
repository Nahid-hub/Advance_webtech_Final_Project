<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;

class HotelController extends Controller
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
     * @param  \App\Http\Requests\StoreHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
    public function Addhotel(){
        return view('Hotel.Addhotel');
    }

    public function AddhotelSubmit(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $p = new Hotel();
        $p->hotelname=$request->hotelname;
        $p->location=$request->location;
        $p->phone=$request->phone;
        $p->price=$request->price;

        if($request->hasFile('image')){
            $imageName = time()."_".$request->file('image')->getClientOriginalName();
            // return $imageName;
            $request->image->move(public_path('images'), $imageName);
            $p->image=$imageName;
            $p->save();
           return redirect(route('Hotellist'));
           //return"ok";
        }

        /* Store $imageName name in DATABASE from HERE */
        return "No file";
    }

    public function Hotellist(){

        $products = Hotel::all();
        return view('Hotel.Hotellist')->with('products',$products);
   }

   public function HotelDelete(Request $request){
    $student = Hotel::where('id', $request->id)->first();
    $student->delete();

    return redirect()->route('Hotellist');
    }

    public function hotelApi(){
        return Hotel::all();
      }
}
