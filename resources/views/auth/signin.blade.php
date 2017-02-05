@extends('admin.index')

@section('content')

    <div class="container">

        <form method="post" action="{{url('/login')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="rememberme" id="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>




@endsection