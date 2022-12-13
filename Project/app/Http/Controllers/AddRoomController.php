<?php

namespace App\Http\Controllers;

use App\Models\AddRoom;
use App\Http\Requests\StoreAddRoomRequest;
use App\Http\Requests\UpdateAddRoomRequest;
use Illuminate\Http\Request;

class AddRoomController extends Controller
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
     * @param  \App\Http\Requests\StoreAddRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddRoom  $addRoom
     * @return \Illuminate\Http\Response
     */
    public function show(AddRoom $addRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddRoom  $addRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(AddRoom $addRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddRoomRequest  $request
     * @param  \App\Models\AddRoom  $addRoom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddRoomRequest $request, AddRoom $addRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddRoom  $addRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddRoom $addRoom)
    {
        //
    }
    public function AddRoom()
    {
        return view('Dashboard.AddRoom');
    }
    public function AddRoomdash(Request $request)
    {
        $addRoom = new AddRoom();
        $addRoom->Hotel_Name= $request->Hotel_Name;
        $addRoom->Room_Details= $request->Room_Details;
        $addRoom->Address= $request->Address;
        $addRoom->Price= $request->Price;
        $addRoom->image=$request->file('image')->store('FileImages') ;     
        $addRoom->save();
        return $request;
        //return redirect()->route('RoomList');
    }
    public function RoomListadd()
    {
        $add_rooms = AddRoom::all(); 
        $add_rooms = AddRoom::paginate(3);
        return AddRoom::all();
       return view('Dashboard.RoomList')->with('add_rooms', $add_rooms);
      
    }
    public function AddRoomEdit(Request $request){
        $add_rooms = addRoom::where('id', $request->id)->first();
        return view('Dashboard.AddRoomEdit')->with('add_rooms', $add_rooms);
       
    
    }
    public function EditSubmitted(Request $request){
        $add_rooms = addRoom::where('id', $request->id)->first();
        
       
        $addRoom->Hotel_Name= $request->Hotel_Name;
        $addRoom->Room_Details= $request->Room_Details;
        $addRoom->Address= $request->Address;
        $addRoom->Price= $request->Price;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $addRoom['image']= $filename;
        }      
        $addRoom->save();
        return redirect()->route('RoomList');

    }

    public function AddRoomDelete(Request $request){
        $addRoom = addRoom::where('id', $request->id)->first();
        $addRoom->delete();

        return redirect()->route('RoomList');
    }
    
    public function HotelList()
    {
        $add_rooms = AddRoom::all(); 
        $add_rooms = AddRoom::paginate(3);
        return view('Dashboard.HotelList')->with('add_rooms', $add_rooms);
      
    }

    //API
    public function RoomList()
    {
        $add_rooms = AddRoom::all(); 
        $add_rooms = AddRoom::paginate(3);
        return AddRoom::all();
      
    }
    public function RoomAdd(Request $request)
    {
        $addRoom = new AddRoom();
        $addRoom->Hotel_Name= $request->Hotel_Name;
        $addRoom->Room_Details= $request->Room_Details;
        $addRoom->Address= $request->Address;
        $addRoom->Price= $request->Price;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $addRoom['image']= $filename;
            
        }
           
        $addRoom->save();
       
    }
}
