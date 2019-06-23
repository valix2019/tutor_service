@extends('layouts.app')
@section('content')

<div class="card mb-3" style="width: 18rem;">
    <div class="card-body">
        <a href="{{route('courses.show',$course->id)}}"><h5 class="card-title">{{$course->Name}}</h5></a>
        <p class="card-text">{{$course->Duration}} </p>
        <p class="card-text">{{$course->Cost}} </p>
        <p class="card-text">{{$course->Location}} </p>
        <div class="card-body">
            @foreach($course->user as $user)
                <h5>{{$user->name}}</h5>
            @endforeach
        </div>
    </div>
</div>

@endsection