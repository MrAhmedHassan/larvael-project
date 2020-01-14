@extends('layouts.app')
{{-- @include('layouts.side-bar') --}}
@section('content')

    <div class='container d-flex flex-column justify-content-end'>


        <div class="card bg-light mb-3 mt-5 w-75">
            <div class="card-header">User info</div>
            <div class="card-body">
                <h5 class="card-title">Name : </h5>
                <p class="card-text">{{$courses->course_name}}</p>
                <h5 class="card-title">Image : </h5>
                <p class="card-text" style="width: 15%;height: 15%"><img class="img-fluid rounded-circle"  src="{{asset($courses->course_image)}}" alt="img_user"></p>
                <h5 class="card-title">Price : </h5>
                <p class="card-text">{{$courses->Price}}</p>
                <h5 class="card-title">created_at : </h5>
                <p class="card-text">{{$courses->created_at}}</p>
                <h5 class="card-title">started_at : </h5>
                <p class="card-text">{{$courses->started_at}}</p>
                <h5 class="card-title">ended_at : </h5>
                <p class="card-text">{{$courses->ended_at}}</p>
            </div>
        </div>

        <a href="/courses" class="btn btn-primary btn-lg active w-25 py-2 my-3" style="margin-left: 25%" role="button" aria-pressed="true">Back to table</a>
    @include('layouts.footer')
    {{-- <h4>{{$myposts->links()}}</h4> --}}
@endsection
