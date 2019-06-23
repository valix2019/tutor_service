@extends('layouts.app')
@section('content')
<!-- extending parent template app.blade.php -->
    
    <h1>Courses</h1>

    <!-- courses variable from CourseControlle@index -->
    @foreach($courses as $course)

        <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
                <a href="{{route('courses.show',$course->id)}}"><h5 class="card-title">{{$course->Name}}</h5></a>
                <p class="card-text">{{$course->Duration}} </p>
                <p class="card-text">{{$course->Cost}} </p>
                <p class="card-text">{{$course->Location}} </p>
            </div>
        </div>
        

        
    @endforeach

@endsection