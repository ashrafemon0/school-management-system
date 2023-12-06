@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Attendance </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-12">



                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Attendance Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date" class="form-control" >
                                                    </div>
                                                </div>

                                            </div>  <!-- // End Col md 6 -->
                                        </div> <!-- // end Row  -->


                                        <div class="row">
                                            <div class="col-md-12">

                                                <table class="table table-bordered table-striped" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                                        <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>
                                                    </tr>

                                                    <tr>
                                                        <th class="text-center btn present_all" style="display: table-cell; background-color: #000000">Present</th>
                                                        <th class="text-center btn leave_all" style="display: table-cell; background-color: #000000">Leave</th>
                                                        <th class="text-center btn absent_all" style="display: table-cell; background-color: #000000">Absent</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr id="div" class="text-center">
                                                            <input type="hidden" name="employee_id[]" value="">
                                                            <td></td>
                                                            <td></td>

                                                            <td colspan="3">
                                                                <div class="switch-toggle switch-3 switch-candy">

                                                                    <input name="atten_status" type="radio" value="Present" id="present" checked="checked">
                                                                    <label for="present">Present</label>

                                                                    <input name="atten_status" value="Leave" type="radio" id="leave"  >
                                                                    <label for="leave">Leave</label>

                                                                    <input name="atten_status" value="Absent"  type="radio" id="absent"  >
                                                                    <label for="absent">Absent</label>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>





                                            </div>   <!-- // End Col md 12 -->
                                        </div> <!-- // end Row  -->



                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>





    </div>
</div>
@endsection
