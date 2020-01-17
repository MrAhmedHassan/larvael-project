@extends('/layouts/app')
@section('content')
    <div class='container mt-5'>
        <form method='post' action='/supporters' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1" class='font-weight-bold'>Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput2" class='font-weight-bold'>Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput2" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput3" class='font-weight-bold'>Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput3" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput4" class='font-weight-bold'>National_id</label>
                <input type="text" name="national_id" class="form-control" id="exampleFormControlInput4" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput5" class='font-weight-bold'>Avatar</label>
                <input type="file" name="avatar" class="form-control" id="exampleFormControlInput5" >
            </div>

            <label class='font-weight-bold'>Choose Supporter's Course</label>
            <select class="custom-select custom-select-lg mb-3"required >
                @foreach($courses as $index => $value)
                    <option value={{$value['id']}} selected>{{$value['course_name']}}</option>
                @endforeach
            </select>

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
