@extends('layouts.app')
@section('content')
<!-- extending parent template app.blade.php -->
    
    <h1>Users</h1>
    <div class="card mb-3" style="width: 18rem;">
        <div class="card-body">
            <a href="{{route('users.show',$user->id)}}"><h5 class="card-title">{{$user->name}}</h5></a>
            <p class="card-text">{{$user->surname}}</p>
            <p class="card-text">{{$user->email}}</p>
            <p class="card-text">{{$user->role}}</p>
            
        </div>
        
    </div>

    @if (\Auth::id()==$user->id)
    <div class="card mb-3" style="width: 18rem;">
        <div class="card-title h3 p-3">Customization</div>
        <div class="card-body">
        <form action="{{route('users.update',$user->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="show_new" {{($user->show_new)? 'checked':''}}>
                <label class="custom-control-label" for="customCheck1">New</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2" name="show_top" {{($user->show_top)? 'checked':''}}>
                <label class="custom-control-label" for="customCheck2">Top</label>
            </div>
            <input class="btn btn-primary mt-3" type="submit" value="Customize">
        </form>
        </div>
        
    </div>
    @endif
    
    

@endsection

