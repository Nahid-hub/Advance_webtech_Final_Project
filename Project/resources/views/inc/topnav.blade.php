<!DOCTYPE html>
<html lang="en">
<head>
<h1>Easy Travels</h1>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <a class="btn btn-primary" href="{{route('Hotelreg')}}">AdminReg</a>
    <a class="btn btn-primary" href="{{route('login')}}">Login</a>
    <a class="btn btn-primary" href="{{route('Customer')}}">CustomerReg</a>
    @if(Session::get('user')) 
        <a class="btn btn-primary" href="{{route('AddRoom')}}">AddRoom </a>
        <a class="btn btn-primary" href="{{route('RoomList')}}">RoomList </a>
        <a class="btn btn-primary" href="{{route('HotelList')}}">HotelList </a>
        <a class="btn btn-primary" href="{{route('Report')}}">Report </a>
        <a class="btn btn-primary" href="{{route('Inquiry')}}">Inquiry </a>
        <a class="btn btn-primary" href="{{route('logout')}}">Log out </a>
    @endif 
</body>
</html>