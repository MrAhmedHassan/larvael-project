@extends('layouts.app')

@include('layouts.side-bar')

@section('content')

    @foreach ($table as $row)
        <img style="position:relative; left:300px;" src="/storage/cover_image/{{$row->cover_image}}" alt="img_user">
    @endforeach

    @include('layouts.footer')


@endsection

