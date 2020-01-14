
@extends('layouts.app')
{{-- @include('layouts.side-bar') --}}
@section('content')

<div class='container d-flex flex-column justify-content-end'>


<div class="card bg-light mb-3 mt-5 w-75">
  <div class="card-header">Student info</div>
  <div class="card-body">
    <h5 class="card-title">Name : </h5>
    <p class="card-text">{{$student->name}}</p>
    <h5 class="card-title">Email : </h5>
    <p class="card-text">{{$student->email}}</p>
    <h5 class="card-title">Gender : </h5>
    <p class="card-text">{{$student->gender}}</p>
    <h5 class="card-title">Birthday : </h5>
    <p class="card-text">{{$student->birth_date}}</p>
    <h5 class="card-title">Image : </h5>
    <div style="width: 7%;height: 7%"><img class="img-fluid rounded-circle"  src="/storage/cover_image/{{$student->profile_image}}" alt="img_user"></div>
  </div>
</div>

<a href="/students" class="btn btn-primary btn-lg active w-25 py-2 my-3" style="margin-left: 25%" role="button" aria-pressed="true">Back to table</a>

@include('layouts.footer')
{{-- <h4>{{$myposts->links()}}</h4> --}}
@endsection


