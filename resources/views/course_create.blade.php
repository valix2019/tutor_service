@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('courses.store')}}" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Course name</label>
    <input type="text" class="form-control" name="Name" placeholder="Enter email" value="{{old('Name')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Course Duration</label>
    <input type="text" class="form-control" name="Duration" placeholder="Enter email" value="{{old('Duration')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Course cost</label>
    <input type="number" class="form-control" name="Cost" placeholder="Enter email" value="{{old('Cost')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Course Location</label>
    <input type="text" class="form-control" name="Location" placeholder="Enter email" value="{{old('Location')}}">
  </div>
  <input hidden type="text" class="form-control" name="teacher_id" placeholder="Enter email" value="{{\Auth::id()}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection