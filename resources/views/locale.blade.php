@extends('layouts.app')
@section('content')

<a class="btn btn-primary" href="{{route('change.locale','ru')}}">ru</a>
<a class="btn btn-primary" href="{{route('change.locale','en')}}">en</a>

@endsection