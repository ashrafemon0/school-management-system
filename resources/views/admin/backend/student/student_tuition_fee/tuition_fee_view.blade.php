@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js" integrity="sha512-n9yUUHek//8TJ7Iu8lYy3tQGYDXIvik5Z7N5Ul84ifkz0zEpWMulCimmkiH3ko7BxOZysC44D1USJNo+SM0wuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Student <strong>Tuition Fee</strong></h4>
                            </div>

                            <div class="box-body">


                                <div class="row">



                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Year <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" required="" class="form-control">
                                                    <option value="">Select User Year</option>
                                                    @foreach($studentYear as $studentYears)
                                                        <option value="{{$studentYears->id}}" >{{$studentYears->year}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->




                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Class <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" required="" class="form-control">
                                                    <option value="">Select User Class</option>
                                                    @foreach($studentClass as $studentClasses)
                                                        <option value="{{$studentClasses->id}}" >{{$studentClasses->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->

                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Month <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="month" id="month" required="" class="form-control">
                                                    <option value="">Select User Class</option>
                                                    <option value="january" >January</option>
                                                    <option value="february" >February</option>
                                                    <option value="march" >March</option>
                                                    <option value="april" >April</option>
                                                    <option value="may" >May</option>
                                                    <option value="june" >June</option>
                                                    <option value="july" >July</option>
                                                    <option value="august" >August</option>
                                                    <option value="september" >September</option>
                                                    <option value="october" >October</option>
                                                    <option value="november" >November</option>
                                                    <option value="december" >December</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->


                                    <div class="col-md-3" style="padding-top: 25px;">

                                        <a id="search" class="btn btn-primary" name="search"> Search</a>

                                    </div> <!-- End Col md 4 -->
                                </div><!--  end row -->


                                <!--  ////////////////// Registration Fee table /////////////  -->


                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="DocumentResults">

                                            <script id="document-template" type="text/x-handlebars-template">

                                                <table class="table table-bordered table-striped" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        @{{{thsource}}}
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @{{#each this}}
                                                    <tr>
                                                        @{{{tdsource}}}
                                                    </tr>
                                                    @{{/each}}
                                                    </tbody>
                                                </table>
                                            </script>



                                        </div>
                                    </div>

                                </div>




                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>


    <script type="text/javascript">
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var month = $('#month').val();
            $.ajax({
                url: "{{ route('student.tuition.fee.classwise.get')}}",
                type: "get",
                data: {'year_id':year_id,'class_id':class_id,'month':month,},
                beforeSend: function() {
                },
                success: function (data) {
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });

    </script>


@endsection
