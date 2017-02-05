@extends('summernote.index')

@section('content')


    <div class="container">

        <form method="post" action="{{route('summernote.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="comment">MIXDATA:</label>
                <textarea class="form-control" name="mixdata" rows="5" id="summernote"></textarea>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });

    </script>




@endsection