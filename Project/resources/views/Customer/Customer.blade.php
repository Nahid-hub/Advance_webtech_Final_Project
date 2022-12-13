@extends('layouts.app')
@section('content')
<h2>Registration Page</h2>
<form action="{{route('Customer')}}" class="form-group" method="post">
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
        <span>Name</span>
        <input type="text" name="Name" value="{{old('Name')}}" class="form-control">
        @error('Name')
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
        <select name="Role" >
                    <option value="Customer" > Customer</option>
                </select>
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