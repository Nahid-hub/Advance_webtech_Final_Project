@extends('layouts.app')
@section('content')
<br>
@if(Session::get('Email')) 
        <a class="btn btn-primary" href="{{route('HotelList')}}">HotelList </a>
        <a class="btn btn-primary" href="{{route('logout')}}">Log out </a>
    @endif
<h1>Welcome</h1>
@endsection 