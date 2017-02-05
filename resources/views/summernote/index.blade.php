<!DOCTYPE html>
<html>
<head>
<title>summernote |home</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

</head>
<body>



<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>mixdata</th>

    </tr>
    </thead>
    <tbody>

    @if($summer)
    @foreach($summer as $summers)
    <tr>
        <td>{{$summers->id}}</td>
        <td>{!! $summers->mixdata !!}</td>

    </tr>
        @endforeach

        @endif
    </tbody>




</table>
@yield('content')


</body>

</html>
