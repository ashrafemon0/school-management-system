@extends('admin.admin_master')
@section('admin')
<<<<<<< HEAD
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
=======
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
>>>>>>> 001e104fcc67b0e7fd5ec022ebe34f7b2afc3527

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Student <strong>Marsk Entry</strong></h4>
                            </div>

                            <div class="box-body">

                                <form method="post" action="">
                                    @csrf
                                    <div class="row">
<<<<<<< HEAD


=======
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Class<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
>>>>>>> 001e104fcc67b0e7fd5ec022ebe34f7b2afc3527

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Year <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}" >{{ $year->year }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->




                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Class <span class="text-danger"> </span></h5>
                                                <div class="controls">
<<<<<<< HEAD
                                                    <select name="class_id" id="class_id"  required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
=======
                                                    <select name="subject_id" id="subject_id" required="" class="form-control">
                                                        <option  selected="" >Select Subject</option>
>>>>>>> 001e104fcc67b0e7fd5ec022ebe34f7b2afc3527

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Subject <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="assign_subject_id" id="assign_subject_id"  required="" class="form-control">
                                                        <option  selected="" >Select Subject</option>


                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Exam Type <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="exam_type_id" id="exam_type_id"  required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class</option>
                                                        @foreach($exam_types as $exam)
                                                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->





                                        <div class="col-md-3"  >

                                            <a id="search" class="btn btn-primary" name="search"> Search</a>

                                        </div> <!-- End Col md 3 -->
                                    </div><!--  end row -->


                                    <!--  ////////////////// Mark Entry table /////////////  -->


                                    <div class="row d-none" id="marks-entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th>ID No</th>
                                                    <th>Student Name </th>
                                                    <th>Father Name </th>
                                                    <th>Gender</th>
                                                    <th>Marks</th>
                                                </tr>
                                                </thead>
                                                <tbody id="marks-entry-tr">

                                                </tbody>

                                            </table>
                                            <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

                                        </div>

                                    </div>


                                </form>


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>


    <script type="text/javascript">
        // Function to load subjects based on the selected class
        function loadSubjects() {
            var class_id = $('#class_id').val();
            //console.log('Selected Class ID:', class_id); // Debugging
            $.ajax({
                url: "{{ route('marks.getsubject') }}",
                type: "GET",
                data: { class_id: class_id },
                success: function (data) {
                    //console.log('Subjects Data:', data); // Debugging
                    var html = '<option value="">Select Subject</option>';
                    $.each(data, function (key, v) {
                        // Access the nested data under "fee_class"
                        html += '<option value="' + v.fee_class.id + '">' + v.fee_class.name + '</option>'; //(FeeClass eita cilo amar model er name)fee_class eita model er name hobe na eita hobe dd kore dekhe nite hobe ki name data array ashce
                    });
                    $('#assign_subject_id').html(html);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error); // Debugging
                }
            });
        }

        // Initial load of subjects on page load
        $(document).ready(function () {
            loadSubjects();

            // Event listener for class selection change
            $(document).on('change', '#class_id', function () {
                loadSubjects();
            });

            // Event listener for the search button
            $(document).on('click', '#search', function () {
                var year_id = $('#year_id').val();
                var class_id = $('#class_id').val();
                var assign_subject_id = $('#assign_subject_id');
                var exam_type_id = $('#exam_type_id').val();

                $.ajax({
                    url: "{{ route('student.marks.getstudents')}}",
                    type: "GET",
                    data: { 'year_id': year_id, 'class_id': class_id },
                    success: function (data) {
                        //console.log('Data:', data);
                        $('#marks-entry').removeClass('d-none');
                        var html = '';

                        data.forEach(function (item) {
                            var student = item.student;

                            if (student) {
                                html +=
                                    '<tr>' +
                                    '<td>' + student.id_no + '<input type="hidden" name="student_id[]" value="' + student.id + '"> <input type="hidden" name="id_no[]" value="' + student.id_no + '"> </td>' +
                                    '<td>' + student.name + '</td>' +
                                    '<td>' + student.fname + '</td>' +
                                    '<td>' + student.gender + '</td>' +
                                    '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>' +
                                    '</tr>';
                            }
                        });

                        $('#marks-entry-tr').html(html);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        // Optionally, you can display a message to the user indicating the error.
                    }
                });
            });
        });
    </script>
@endsection
