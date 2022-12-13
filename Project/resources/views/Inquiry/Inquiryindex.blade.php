@extends('layouts.app')
@section('content')
<h2>InqIndex</h2>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Question</th>
        <th>Answer</th>
    </tr>
    @foreach($inquiries as $item)
    
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->Name}}</td>
            <td>{{$item->Question}}</td>
            <td>{{$item->Answer}}</td>
        </tr>
    
     @endforeach
</table>
@endsection