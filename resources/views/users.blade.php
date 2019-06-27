@extends('layouts.app')
@section('content')
<!-- extending parent template app.blade.php -->
    
    <h1>{{ __('messages.users') }}</h1>

@foreach($users as $user)

        <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
                <a href="{{route('users.show',$user->id)}}"><h5 class="card-title">{{$user->name}}</h5></a>
                <p class="card-text">{{$user->surname}}</p>
                <p class="card-text">{{$user->email}}</p>
                <p class="card-text">{{$user->role}}</p>
                
            </div>
            
        </div>
        

        
@endforeach

@endsection

