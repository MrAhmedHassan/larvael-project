@extends('layouts.app')
@include('layouts.side-bar')
@section('content')

<div class="container-fluid">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Birthday</th>
      <th scope="col"><span style="margin-left: 100px">Show</span></th>
    </tr>
  </thead>
  <tbody>
  @foreach($students as $index => $value)  
    <tr>
      <th scope="row">{{$value['id']}}</th>
      <td>{{$value['name']}}</td>
      <td>{{$value['email']}}</td>
      <td>{{$value['gender']}}</td>
      <td>{{$value['birth_date']}}</td>



      <td class="d-flex ">
      <a href="{{route('students.show',['student' => $value['id']])}}" class="mx-2"><button type="button" class="btn btn-info">View Details</button></a>
      {{-- <form method="post" action="supporters/{{$value['id']}}">
      {{method_field('DELETE')}}
      @csrf
      <button type="submit" class="btn btn-danger" onclick='return confirm("Do you Really Want to Delete ?!!")'>Delete</button>
      </form> --}}
      </td>
    </tr>
    @endforeach

    
  </tbody>
</table>
</div>

@include('layouts.footer')
{{-- <h4>{{$myposts->links()}}</h4> --}}
@endsection

