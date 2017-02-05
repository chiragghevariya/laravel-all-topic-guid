@extends('admin.index')


@section('content')


    <div class="container">

        <form method="POST" action="{{route('admin.store')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">NAME:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="name">phone No:</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone">
            </div>

            <div class="form-group">
              <label for="sel1">Select your hobbies:</label>
              <select class="form-control" name="hobbies">
                <option>Computer programming</option>
                <option>Acting</option>
                <option>Cooking</option>
                <option>Dancing</option>
              </select>
            </div>

            <div class="form-group">
              <label for="sel1">Select role:</label>
                <select name="role"   class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photo" class="control-label">photo</label>
                <input type="file" name="photo" class="form-control">
            </div>

             <div class="form-group">
                   <label for="name">body:</label>
                   <textarea class="form-control" name="body" id="summernote"></textarea>
              </div>

            <button type="submit" class="btn btn-primary">signup</button>

        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });

    </script>


@endsection