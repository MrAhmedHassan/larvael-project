@extends('layouts.app')
@include('layouts.side-bar')
@section('content')


<div class='d-flex justify-content-center align-items-center m-5'>
<a href="/Courses/create"><button type="button" class="btn btn-success py-2">Create Course</button></a>
</div>

<div class="container-fluid">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Created_at</th>
      <th scope="col">Start_date</th>
      <th scope="col">End_date</th>
      <th scope="col">Teacher</th>

      <th scope="col"><span style="margin-left: 100px">CRUD</span></th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $index => $value)  
    <tr>
      <th scope="row">{{$value['id']}}</th>
      <td>{{$value['course_name']}}</td>
      <td>{{$value['course_image']}}</td>
      <td>{{$value['price']}}</td>
      <td>{{$value['created_at']}}</td>
      <td>{{$value['started_at']}}</td>
      <td>{{$value['ended_at']}}</td>
      <td>"55"</td>



      <td class="d-flex ">
      <a href="{{route('courses.show',['post' => $value['id']])}}" class="mx-2"><button type="button" class="btn btn-info">View Details</button></a>
      <a href="{{route('courses.edit',['post' => $value['id']])}}" class="mx-2"><button type="button" class="btn btn-warning">Edit</button></a>
      <form method="post" action="Courses/{{$value['id']}}">
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

