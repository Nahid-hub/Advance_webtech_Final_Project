<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use Illuminate\Http\Request;

class BusController extends Controller
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
     * @param  \App\Http\Requests\StoreBusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusRequest  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusRequest $request, Bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        //
    }
    public function Buslist(){
        $Admins = Bus::all(); 
        $Admins = Bus::paginate(3);
        return view('Bus.Buslist')->with('Admins', $Admins);
    }

    public function BusDelete(Request $request){
    $student = Bus::where('id', $request->id)->first();
    $student->delete();
    
    return redirect()->route('Buslist');
        }

    public function Buslistapi(){
      return Bus::all();
    }

    public function Buslistapipost(Request $request){
        $admin = new Bus();
               $admin->id= $request->id;
               $admin->name= $request->name;
               $admin->seat= $request->seat;
               $admin->location= $request->location;
               $admin->description= $request->description;
               
               $admin->save();
               return $request;
        
      }
}
