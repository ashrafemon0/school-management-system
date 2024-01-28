@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Student <strong>Cart</strong></h4>
                            </div>

                            <div class="box-body">

                                <form method="post" action="{{route('add.cart.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Student Name <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="user_name" id="user_name" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}" >{{$user->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Class <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="class_name" id="class_name"  required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Fee Category <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="cat_name" id="cat_name"  required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class</option>
                                                        @foreach($feeCategories as $feeCategorie)
                                                            <option value="{{ $feeCategorie->id }}">{{ $feeCategorie->name }}</option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Student ID <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="user_id" id="user_id"  required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->id_no }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->
                                    </div><!--  end row -->

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Date <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <input type="date" name="date" class="form-control" >
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Amount <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <input type="text" name="amount" class="form-control" >
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Remark <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <input type="text" name="remark" class="form-control" >
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->

                                    </div><!--  end row -->

                                        <input type="submit" class="btn btn-info" value="Next">

                                </form>


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>

@endsection
