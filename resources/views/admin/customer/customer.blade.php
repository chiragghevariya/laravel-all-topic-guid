<!DOCTYPE html>
<html>
<head>
    <title>Customer</title>

    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery-3.1.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}


</head>
<body>

<div class="container">

    <div class="panel panel-default">

        <div class="panel-heading">

            <button type="button" class="btn btn-primary" id="add" value="add">Add new customer</button>

        </div>

        <div class="panel panel-body">
            @include('admin.customer.newCustomer')
            <caption>Customer Info</caption>
            <table class="table" id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($cust)
                    @foreach($cust as $key=>$customer)
                        <tr id="customer{{$customer->id}}" >
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->first_name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->sex}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>
                                <button class="btn btn-success btn-edit" data-id="{{$customer->id}}">Edit</button>
                                <button class="btn btn-danger btn-delete" data-id="{{$customer->id}}">Delete</button>

                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>

                {{--{{$cust->links()}}--}}



        </div>

    </div>

    @yield('content')

    <script src="bootstrap/js/jquery-3.1.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    {{--<script src="//code.jquery.com/jquery-1.12.3.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#example').DataTable();
        } );

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
            }
        });

        $('#add').on('click',function () {
            $('#save').val('save');
            $('#frmcustomer').trigger('reset');
            $('#customer').modal('show');
        });


     ///      on submit create data
        $('#frmcustomer').on('submit',function (e) {

            e.preventDefault();

            var form= $('#frmcustomer');
            var formData= form.serialize();
            var url= form.attr('action');

            var state=$('#save').val();
            var type='post';
            if(state=='update'){
                type='put';
            }
            $.ajax({
                type:type,
                url: url,
                data: formData,

                success:function(data) {
                    console.log(data);

//                    var sex="";
//                    if(data.sex==0){
//                        sex="Mail";
//                    }else
//                    {sex="Femail";}
//                    var row='<tr>' +
//                            '<td>' + data.id         + '</td>'+
//                            '<td>' + data.first_name + '</td>'+
//                            '<td>' + data.last_name  + '</td>'+
//                            '<td>' + data.email + '</td>'+
//                            '<td>' + sex + '</td>'+
//                            '<td>'  + data.phone      + '</td>'+
//                            '<td> <button class="btn btn-success btn-edit" data-id="'+ data.id +'">Edit</button>'+
//                            '<button class="btn btn-danger btn-delete" data-id="'+ data.id +'">Delete</button></td>'+
//                            '</tr>';
//
//                    if(state=='save'){
//                        $('tbody').append(row);
//                    }else {
//
//                        $('#customer'+data.id).replaceWith(row);
//                    }

                    $('#frmcustomer').trigger('reset');
                    $('#first_name').focus();
                }
            });
        })

        {{--//----------------add row--}}

        function addRow(data) {
            var sex="";
            if(data.sex==0){
                sex="Mail";
            }else
            {sex="Femail";}
            var row='<tr>' +
                    '<td>' + data.id         + '</td>'+
                    '<td>' + data.first_name + '</td>'+
                    '<td>' + data.last_name  + '</td>'+
                    '<td>' + data.email + '</td>'+
                    '<td>' + sex + '</td>'+
                    '<td>'  + data.phone      + '</td>'+
                    '<td> <button class="btn btn-success btn-edit">Edit</button>'+
                    '<button class="btn btn-danger btn-delete">Delete</button></td>'+
                    '</tr>';

                     $('tbody').append(row);
        }

        ///   getupdate

        $('tbody').delegate('.btn-edit','click',function () {

            var value=$(this).data('id');
            var url='{{URL::to('getUpdate')}}';

            $.ajax({
                type:'get',
                url:url,
                data:{'id':value},
                success:function (data) {
                    console.log(data);
                    $('#id').val(data.id);
                    $('#first_name').val(data.first_name);
                    $('#last_name').val(data.last_name);
                    $('#sex').val(data.sex);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#save').val('update');
                    $('#customer').modal('show');
                }
            });


        });

        //// delete customer

        $('#tbody').delegate('#.btn-delete','click',function () {

            var value=$(this).data('id');
            var url='{{URL::to('/deleteCustomer')}}';
            if(conforms('do you want to delete this record?')==ture){

                $.ajax({

                    type:'delete',
                    url:url,
                    data:{'id':value},
                    success:function (data) {

                        alert(data.sms);
                        $('#customer'+value).remove();
                    }

                });
            }
        });

    </script>





</div>

</body>

</html>

