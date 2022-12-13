@extends('layouts.app')
@section('content')
<h2>Registration Page</h2>
<form action="{{route('Hotelreg')}}" class="form-group" method="post">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-4 form-group">
        <span>ID</span>
        <input type="text" name="id" value=""class="form-control">
        @error('id')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>Hotel Name</span>
        <input type="text" name="Hotel_Name" value="{{old('Hotel_Name')}}" class="form-control">
        @error('Hotel_Name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <span>Email</span>
        <input type="text" name="Email" value="{{old('Email')}}" class="form-control">
        @error('Email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>Password</span>
        <input type="Password" name="Password" value="{{old('Password')}}" class="form-control">
        @error('Password')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
    <span>Role</span>
        <select name="Role">
                    <option value=""> Select</option>
                    <option value="HotelAdmin"> HotelAdmin</option>
                    <option value="Customer" > Customer</option>
                </select>
    </div>
    <div class="col-md-4 form-group">
        <span>Type</span>
        <select name="Type">
                    <option value=""> Select</option>
                    <option value="Five Star"> Five Star</option>
                    <option value="Three Star" > Three Star</option>
                    <option value="Two Star"> Two Star</option>
                    <option value="Local"> Local</option>

                </select>
    </div>

    <div class="col-md-4 form-group">
        <span>Place</span>
        <select name="Place">
                    <option value=""> Select</option>
                    <option value="Dhaka" > Dhaka</option>
                    <option value="Khulna"> Khulna</option>
                    <option value="Jashore" > Jashore</option>
                    <option value="Kuakata" > Kuakata</option>
                    <option value="Cox'sBazar'" > Cox'sBazar'</option>
                    <option value="Rajshahi" > Rajshahi</option>
                    <option value="Sylhet" > Sylhet</option>
        </select>
    </div>

    <div class="col-md-4 form-group">
        <span>Address</span>
        <input type="text" name="Address" value="{{old('Address')}}" class="form-control">
        @error('Address')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>Phone Number</span>
        <input type="text" name="Phone_Number" value="{{old('Phone_Number')}}" class="form-control">
        @error('Phone_Number')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <br>
    <input type="submit" class="btn btn-success" value="Submit" >                  
</form>
@endsection 
