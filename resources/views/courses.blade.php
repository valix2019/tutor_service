@extends('layouts.app')
@section('content')
<!-- extending parent template app.blade.php -->
    
    <h1> {{__('messages.courses')}} </h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><a href="#courses_m">{{ __('messages.My courses') }}</a></li>
        @if(\Auth::user()->show_new)
        <li class="list-group-item"><a href="#courses_n">{{ __('messages.New courses') }}</a></li>
        @endif
        @if(\Auth::user()->show_top)
        <li class="list-group-item"><a href="#courses_t">{{ __('messages.Top courses') }}</a></li>
        @endif
        <li class="list-group-item"><a href="#courses_a">{{ __('messages.All courses') }}</a></li>
    </ul>

    <!-- courses variable from CourseControlle@index -->
    @component('components.course_panel',['id'=>'courses_m','h1'=>'My courses','courses'=>$courses_m])
    @endcomponent

    @if(\Auth::user()->show_new)
        @component('components.course_panel',['id'=>'courses_n','h1'=>'New courses','courses'=>$courses_n])
        @endcomponent
    @endif
    @if(\Auth::user()->show_top)
        @component('components.course_panel',['id'=>'courses_t','h1'=>'Top courses','courses'=>$courses_t])
        @endcomponent
    @endif

    @component('components.course_panel',['id'=>'courses_a','h1'=>'All courses','courses'=>$courses_a])
    @endcomponent

@endsection