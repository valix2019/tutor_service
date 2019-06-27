@extends('layouts.app')
@section('content')

<div class="card mb-3" style="width: 18rem;">
    <div class="card-body">
        <a href="{{route('courses.show',$course->id)}}"><h5 class="card-title">{{$course->Name}}</h5></a>
        <p class="card-text">{{$course->Duration}} </p>
        <p class="card-text">{{$course->Cost}} </p>
        <p class="card-text">{{$course->Location}} </p>
        <div class="card-body">
            @foreach($course->students as $user)
                <h5>{{$user->name}}
                @if(\Auth::user()->role == 'admin')
                <form action="{{route('courses.deleteApplication')}}" method="POST">
                    @csrf
                    <input type="text" name="user_id" hidden value="{{$user->id}}" required/>
                    <input type="text" name="course_id" hidden value="{{$course->id}}" required/>
                    <input class="btn btn-warning" type="submit" value="Delete"/>
                </form>
                @endif
                </h5>
            @endforeach
        </div>
        <div class="card-body">
            @foreach($course->teachers as $user)
                <h5>{{$user->name}}
                @if(\Auth::user()->role == 'admin')
                <form action="{{route('courses.deleteApplication')}}" method="POST">
                    @csrf
                    <input type="text" name="user_id" hidden value="{{$user->id}}" required/>
                    <input type="text" name="course_id" hidden value="{{$course->id}}" required/>
                    <input class="btn btn-warning" type="submit" value="Delete"/>
                </form>
                @endif
                </h5>
            @endforeach
        </div>
        @if(\Auth::user() && in_array(\Auth::id(),$course->teachers->pluck('id')->values()->all()))
            <a class="btn btn-warning" href="{{route('courses.edit',$course->id)}}">Edit</a>
            <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-warning" type="submit" value="Delete"/>
            </form>
        @elseif(\Auth::user()->role == 'student' && !in_array(\Auth::id(),$course->students->pluck('id')->values()->all()))
            <a class="btn btn-warning" href="{{route('courses.apply',$course->id)}}">Apply</a>
        @endif
    </div>
</div>

@endsection