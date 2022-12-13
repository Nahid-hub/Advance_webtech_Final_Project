@extends('layouts.app')
@section('content')
<h2>Report Page</h2>
<form action="{{route('Report')}}" class="form-group" method="post">
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
        <span>Id</span>
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
        <span>Topic</span>
        <input type="Topic" name="Topic" value="{{old('Topic')}}" class="form-control">
        @error('Topic')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <span>Details</span>
        <input type="text" name="Details" value="{{old('Details')}}" class="form-control">
        @error('Details')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Submit</button>                  
</form>
@endsection 