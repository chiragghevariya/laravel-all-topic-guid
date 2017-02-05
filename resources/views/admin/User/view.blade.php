@extends('admin.index')

@section('content')


    <div class="container">

        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>phooto</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th>hobbies</th>
                <th>role</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)

                    <tr>

                        <td>{{$post->id}}</td>
                        <td><img width="50" height="50"  src="{{$post->photo}}" alt="Add Photo"></td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->email}}</td>
                        <td>{{$post->phone}}</td>
                        <td>{{$post->hobbies}}</td>
                        <td>{{$post->role}}</td>
                        <td><a href="{{route('admin.edit',['id'=>$post->id])}}"
                               class="btn btn-sm btn-primary">Edit
                            </a>
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>



@endsection