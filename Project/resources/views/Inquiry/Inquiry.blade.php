@extends('layouts.app')
@section('content')
<h1>Inq page</h1>
<form action="{{route('Inquiry')}}" class="form-group" method="post">
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
                <input type="text" name="Name" value=""class="form-control">
                @error('Name')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="col-md-4 form-group">
                 <span>Question</span>
                 <input type="Topic" name="Question" value="{{old('Question')}}" class="form-control">
                @error('Question')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>

        <div class="col-md-4 form-group">
                 <span>Answer</span>
                 <input type="text" name="Answer" value="{{old('Answer')}}" class="form-control">
                @error('Answer')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
    <button type="submit" class="btn btn-success">Submit</button>                  
</form>
@endsection 