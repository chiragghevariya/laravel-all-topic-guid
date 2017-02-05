@extends('admin.index')


@section('content')

    <div class="container">

        <div class="modal fade" id="customer" role="dialog">


            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Fill Information</h4>

                    </div>

                    <div class="modal-body">


                        <form action="{{url('/newCustomer')}}" method="post" id="frmcustomer">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="form-group">
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="">select sex</option>
                                            <option value="0">Mail</option>
                                            <option value="1">Femail</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" id="id" value="">

                            <div class="modal-footer">
                                <input type="submit" value="save" id="save" class="btn btn-primary"/>
                                <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                            </div>

                        </form>


                    </div>

                </div>

            </div>


        </div>

    </div>


@endsection