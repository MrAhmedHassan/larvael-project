@extends('/layouts/app')

@section('content')


<div class='container mt-5'>

<form method='post' action='/Courses/{{$post->id}}'>
{{method_field('PUT')}}
@csrf

<div class="form-group">
    <label for="exampleFormControlInput1" class='font-weight-bold'>Name</label>
    <input type="text" name="course_name" class="form-control" value="{{$post->course_name}}" id="exampleFormControlInput1" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput2" class='font-weight-bold'>Image</label>
    <input type="file" name="course_image" class="form-control" id="exampleFormControlInput2" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput3" class='font-weight-bold'>Price</label>
    <input type="number" name="price" class="form-control" value="{{$post->price}}" id="exampleFormControlInput3" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput4" class='font-weight-bold'>created_at</label>
    <input type="date" name="created_at" class="form-control" value="{{$post->created_at}}" id="exampleFormControlInput4" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput5" class='font-weight-bold'>started_at</label>
    <input type="date" name="started_at" class="form-control" value="{{$post->started_at}}" id="exampleFormControlInput5" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput6" class='font-weight-bold'>ended_at</label>
    <input type="date" name="ended_at" class="form-control" value="{{$post->ended_at}}" id="exampleFormControlInput6" >
  </div>


  <button type="submit" class="btn btn-primary mb-3">Edit</button>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</form>

  </div>


@endsection

