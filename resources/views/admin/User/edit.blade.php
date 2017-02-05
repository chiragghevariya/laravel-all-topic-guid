@extends('admin.index')


@section('content')


    <div class="container">

        <form method="POST" action="{{route('admin.update',['id'=>$post->id])}}" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">NAME:</label>
                <input type="text" class="form-control" name="name" value="{{$post->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{$post->email}}">
            </div>

            <div class="form-group">
                <label for="name">phone No:</label>
                <input type="text" class="form-control" name="phone" value="{{$post->phone}}">
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
                        <option value="{{$role->id}}"@if($post->role == $role->id) selected @endif>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photo" class="control-label">photo</label>
                <input type="file" name="photo" class="form-control" value="{{$post->photo}}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
        {{--<option value="{{$role->id}}"@if($post->role == $role->id) selected @endif>{{$role->name}}</option>--}}
    </div>

@endsection