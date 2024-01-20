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
                                <h4 class="box-title">Student <strong>Fee Entry</strong></h4>
                            </div>

                            <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Year <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}" >{{$year->year}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->


                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <h5>Class <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id"  required="" class="form-control">
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
                                                <h5>Fee Categories <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="fee_category_id" id="fee_category_id"  required="" class="form-control">
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
                                                <h5>Date <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <input type="date" name="date" class="form-control" >
                                                </div>
                                            </div>

                                        </div> <!-- End Col md 3 -->

                                        <div class="col-md-3"  >

                                            <a id="search" class="btn btn-primary" name="search"> Search</a>

                                        </div> <!-- End Col md 3 -->
                                    </div><!--  end row -->


                                    <!--  ////////////////// Mark Entry table /////////////  -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="DocumentResults">

                                                <script id="document-template" type="text/x-handlebars-template">
                                                    <form action="{{route('account.fee.store')}}" method="post">
                                                        @csrf
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
                                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>
                                                    </form>
                                                </script>



                                            </div>


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
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var fee_category_id = $('#fee_category_id').val();
            var date = $('#date').val();
            $.ajax({
                url: "{{ route('account.fee.getStudent')}}",
                type: "get",
                data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date,},
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
