@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content-wrapper" style="min-height: 984.547px;">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Student <strong>Search</strong></h4>
                            </div>

                            <div class="box-body">
                                <form method="POST" action="{{route('student.roll.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Class<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id" required="" class="form-control">
                                                        <option value="">Select User Class</option>
                                                        @foreach($studentClass as $studentClasses)
                                                            <option value="{{$studentClasses->id}}" {{ (@$class_id == $studentClasses->id)? 'selected': ''}}>{{$studentClasses->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Year<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required="" class="form-control">
                                                        <option value="">Select User Year</option>
                                                        @foreach($studentYear as $studentYears)
                                                            <option value="{{$studentYears->id}}" {{ (@$year_id == $studentYears->id)? 'selected': ''}}>{{$studentYears->year}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="padding-top: 25px">
                                            <a id="search" class="btn btn-primary">Search</a>
                                        </div>
                                    </div>


                                    <div class="row d-none" id="roll-generate">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID NO</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        <th>Gender</th>
                                                        <th>Roll</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="roll-generate-tr">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>





                                    <input type="submit" value="Roll Generate" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- /.content -->

        </div>
    </div>
    <script type="text/javascript">
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            $.ajax({
                url: "{{ route('student.roll.get')}}",
                type: "GET",
                data: {'year_id':year_id,'class_id':class_id},
                success: function (data) {
                    $('#roll-generate').removeClass('d-none');
                    var html = '';
                    $.each( data, function(key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.fname+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
                            '</tr>';
                    });
                    html = $('#roll-generate-tr').html(html);
                }
            });
        });

    </script>


@endsection
