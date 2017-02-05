<!DOCTYPE html>
<html>
<head>
<title>HELLO</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table">
    <thead>
    <tr>
        <th>id</th>

        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>hobbies</th>
        <th>role</th>

    </tr>
    </thead>
    <tbody>
    @if($posts)
        @foreach($posts as $post)

            <tr>

                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->email}}</td>
                <td>{{$post->phone}}</td>
                <td>{{$post->hobbies}}</td>
                <td>{{$post->role}}</td>


            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</body>
</html>
