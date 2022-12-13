@extends('layouts.app')
@section('content')
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Hotel Name</th>
        <th>Room Details</th>
        <th>Address</th>
        <th>Price</th>
        <th>image</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($add_rooms as $item)
    
        <tr>
                <td>{{$item->id}}</td><br>
                <td>{{$item->Hotel_Name}}</td><br>
                <td>{{$item->Room_Details}}</td><br>
                <td>{{$item->Address}}</td><br>
                <td>{{$item->Price}}</td><br>
                <td>	     
                <img src="{{ url('public/Image/'.$item->image) }}"
                style="height: 100px; width: 150px;"></td><br> 
        </tr>
    
    @endforeach
</table>
@endsection