@extends('layouts.app')
@include('layouts.side-bar')
@section('content')


<div class='d-flex justify-content-center align-items-center m-2'>
  <h1>Students Comments</h1>
</div>

<div class="container-fluid">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User_id</th>
      <th scope="col">Comment</th>
      <th scope="col">Created_at</th>

      <!-- <th scope="col"><span style="margin-left: 100px">CRUD</span></th> -->
    </tr>
  </thead>
  <tbody>
  @foreach($comments as $comment => $value)  
    <tr>
      <th scope="row">{{$value['id']}}</th>
      <td>{{$value['user_id']}}</td>
      <td>{{$value['comment']}}</td>
      <td>{{$value['created_at']}}</td>
     



      <td class="d-flex ">
      <a href="#" class="mx-2"><button type="button" class="btn btn-info">Approve</button></a>
      <a href="#" class="mx-2"><button type="button" class="btn btn-warning">Reject</button></a>
      <form method="post" action="courses/{{$value['id']}}">
      {{method_field('DELETE')}}
      @csrf
      </form>
      </td>
    </tr>
    @endforeach

    
  </tbody>
</table>
</div>

@include('layouts.footer')
@endsection

