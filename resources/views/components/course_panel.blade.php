<div class="card p-4 mb-3" id="{{$id}}">
<h1>{{$h1}}</h1>
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
</div>