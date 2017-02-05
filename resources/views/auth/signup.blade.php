@extends('admin.index')

@section('content')

    <div class="container">

      <form method="POST" action="{{url('/register')}}">

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
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter password">
              </div>
              <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
              </div>
              <button type="submit" class="btn btn-primary">signup</button>

      </form>

    </div>



@endsection