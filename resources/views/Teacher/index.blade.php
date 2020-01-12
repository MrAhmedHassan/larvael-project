@extends('layouts.app')
@include('layouts.side-bar')
@section('content')


<div class='d-flex justify-content-center align-items-center m-5'>
<a href="/Teacher/create"><button type="button" class="btn btn-success py-2">Create Teacher</button></a>
</div>

<div class="container-fluid">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">National_id</th>
      <th scope="col">avatar</th>
      <th scope="col"><span style="margin-left: 100px">CRUD</span></th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $index => $value)  
    <tr>
      <th scope="row">{{$value['id']}}</th>
      <td>{{$value['name']}}</td>
      <td>{{$value['email']}}</td>
      <td>{{$value['national_id']}}</td>
      <td>{{$value['avatar']}}</td>



      <td class="d-flex ">
      <a href="{{route('teacher.show',['post' => $value['id']])}}" class="mx-2"><button type="button" class="btn btn-info">View Details</button></a>
      <a href="{{route('teacher.edit',['post' => $value['id']])}}" class="mx-2"><button type="button" class="btn btn-warning">Edit</button></a>
      <form method="post" action="Teacher/{{$value['id']}}">
      {{method_field('DELETE')}}
      @csrf
      <button type="submit" class="btn btn-danger" onclick='return confirm("Do you Really Want to Delete ?!!")'>Delete</button>
      </form>
      </td>
    </tr>
    @endforeach

    
  </tbody>
</table>
</div>

@include('layouts.footer')
{{-- <h4>{{$myposts->links()}}</h4> --}}
@endsection

