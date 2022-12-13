@extends('layouts.app')
@section('content')
<form action="{{route('AddRoomEdit')}}" class="form-group" method="POST">
            @csrf
            <div class="container">
                <div class="row ">

           <div class="form-group">
                    <span>ID</span>
                    <input type="text" name="id" placeholder="Id"class="form-control">
                    @error('id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
           </div>
           <br>
            <div class="form-group">
                    <span>Hotel Name</span>
                    <input type="text" name="Hotel_Name" placeholder="Hotel_Name" class="form-control">
                    @error('Hotel_Name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <span>Room Details</span>
                    <input type="text" name="Room_Details" placeholder="Room_Details" class="form-control">
                    @error('Room_Details')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div class="col-md-4 form-group">
                   <span>Address</span>
                   <input type="text" name="Address" value="{{old('Address')}}" class="form-control">
                   @error('Address')
                   <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>
                <br>
                <div class="form-group">
                    <span>Price</span>
                    <input type="number" name="Price" Placeholder="Price"class="form-control">
                    @error('Price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <br>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>

                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>

            </div>
            </div>

        </form>

@endsection