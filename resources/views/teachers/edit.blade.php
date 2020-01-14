@extends('/layouts/app')

@section('content')


<div class='container mt-5'>

<form method='post' action='/teachers/{{$teacher->id}}'>
{{method_field('PUT')}}
@csrf

<div class="form-group">
    <label for="exampleFormControlInput1" class='font-weight-bold'>Name</label>
    <input type="text" name="name" class="form-control" value="{{$teacher->name}}" id="exampleFormControlInput1" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput2" class='font-weight-bold'>Password</label>
    <input type="password" name="password" class="form-control" id="exampleFormControlInput2" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput3" class='font-weight-bold'>Email</label>
    <input type="email" name="email" class="form-control" value="{{$teacher->email}}" id="exampleFormControlInput3" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput4" class='font-weight-bold'>National_id</label>
    <input type="text" name="national_id" class="form-control" value="{{$teacher->national_id}}" id="exampleFormControlInput4" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput5" class='font-weight-bold'>Avatar</label>
    <input type="text" name="avatar" class="form-control" value="{{$teacher->avatar}}" id="exampleFormControlInput5" >
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

