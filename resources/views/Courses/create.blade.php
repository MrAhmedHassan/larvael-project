@extends('/layouts/app')

@section('content')


<div class='container mt-5'>

<form method='post' action='/Courses'>
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1" class='font-weight-bold'>Name</label>
    <input type="text" name="course_name" class="form-control" id="exampleFormControlInput1" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput2" class='font-weight-bold'>Image</label>
    <input type="file" name="course_image" class="form-control" id="exampleFormControlInput2" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput3" class='font-weight-bold'>Price</label>
    <input type="number" name="price" class="form-control" id="exampleFormControlInput3" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput5" class='font-weight-bold'>started_at</label>
    <input type="date" name="started_at" class="form-control" id="exampleFormControlInput5" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput5" class='font-weight-bold'>ended_at</label>
    <input type="week" name="ended_at" class="form-control" id="exampleFormControlInput6" >
  </div>


  <button type="submit" class="btn btn-success">Create</button>

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
