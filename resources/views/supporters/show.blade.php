
@extends('layouts.app')
{{-- @include('layouts.side-bar') --}}
@section('content')

<div class='container d-flex flex-column justify-content-end'>


<div class="card bg-light mb-3 mt-5 w-75">
  <div class="card-header">Supporter info</div>
  <div class="card-body">
    <h5 class="card-title">Name : </h5>
    <p class="card-text">{{$supporter->name}}</p>
    <h5 class="card-title">Email : </h5>
    <p class="card-text">{{$supporter->email}}</p>
    <h5 class="card-title">National_id : </h5>
    <p class="card-text">{{$supporter->national_id}}</p>
    <h5 class="card-title">Avatar_img : </h5>
    <p class="card-text">{{$supporter->avatar}}</p>
  </div>
</div>

<a href="/supporters" class="btn btn-primary btn-lg active w-25 py-2 my-3" style="margin-left: 25%" role="button" aria-pressed="true">Back to table</a>

@include('layouts.footer')
{{-- <h4>{{$myposts->links()}}</h4> --}}
@endsection

