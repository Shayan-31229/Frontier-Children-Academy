@extends('layouts.master')

@section('css')


@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="row">
                    @include('student.registration.includes.commonbuttons')
                </div>

                <div class="page-header">
                    <h1>
                        @include($view_path . '.includes.breadcrumb-primary')
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Student Scrutiny for Interview
                        </small>
                    </h1>
                </div><!-- /.page-header -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{ __('form_fields.student.fields.faculty')}}</label>
                            <div class="col-sm-8">
                                {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control chosen-select', 'onChange' => 'loadStudents(this);']) !!}
                            </div>
                            <div class="text-center bttons">
                                @include('student.registration.includes.scrutinybuttons')
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover tbl-students tbl1">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            <label class="pos-rel">
                                                <input type="checkbox" class="ace chk-all" />
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th> Student Name </th>
                                        <th> Father Name </th>
                                        <th> Gender </th>
                                        <th> Reg Date </th>
                                        <th> KMU CAT </th>
                                        <th> Matric </th>
                                        <th> FA/FSc </th>
                                        <th> Agregate </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('includes.scripts.mydataTable_scripts')
    <script>
        $(document).ready(function () {
            $(document).on('change', '.chk-all', function () {
                const isChecked = this.checked;
                $('.tbl-students tbody .chkstd').prop('checked', isChecked);
            });

            /* keep the master checkbox in sync with individual selections */
            $(document).on('change', '.tbl-students tbody .chkstd', function () {
                const total = $('.tbl-students tbody .chkstd').length;
                const selected = $('.tbl-students tbody .chkstd:checked').length;
                $('.chk-all').prop('checked', total === selected);
            });

            $("body").on("click", ".btn-mark-single", function (e) {
                e.preventDefault();
                var ids = [];
                var id = $(this).data("id");
                ids.push(id);
                MarkforInterview(ids);
            });

            $("body").on("click", ".btn-mark-all", function (e) {
                e.preventDefault();
                var ids = [];
                $(".tbl-students tbody tr").each(function (i, k) {
                    if ($(this).find(".chkstd").is(":checked")) {
                        var thisid = $(this).find(".btn-mark-single").data("id");
                        ids.push(thisid);
                    }
                });
                MarkforInterview(ids);
            });

        });

        $(".btn-drop-all").click(function (e) {
            e.preventDefault();
            var stds = [];

            $(".tbl-students tbody tr").each(function (i, k) {
                if ($(this).find(".chkstd").is(":checked")) {
                    var thisid = $(this).find(".btn-mark-single").data("id");
                    stds.push({ "id": thisid });
                }
            });
            if (stds.length == 0) {
                toastr.error("Please select at least one student");
                return;
            }

            DropStudent(stds);
        });


        function DropStudent(stds) {
            //console.log(stds);
            $.ajax({
                type: 'POST',
                url: '{{ route('student.dropstudents') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    stds: stds
                },
                success: function (response) {
                    var data = response;
                    if (data.error) {
                        //$.notify(data.message, "warning");
                        toastr.error(data.message);
                    } else {
                        $.each(stds, function (i, std) {
                            $(".tbl-students tbody tr .btn-mark-single[data-id='" + std.id + "']").parents("tr").remove();
                        });
                        toastr.success(data.message);
                    }
                }
            });
        }



        function MarkforInterview(ids) {
            $.ajax({
                type: 'POST',
                url: '{{ route('student.markforinterview') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: ids
                },
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.error) {
                        $.notify(data.message, "warning");
                    } else {
                        $.each(ids, function (i, id) {
                            $(".tbl-students tbody tr .btn-mark-single[data-id='" + id + "']").parents("tr").remove();
                        });
                        toastr.success("Student(s) marked for interview");
                    }
                }
            });
        }

        function loadStudents($this) {
            $.ajax({
                type: 'POST',
                url: '{{ route('student.getstudentbystatus') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    faculty_id: $this.value,
                    status: 8   //scrutiny (Online Registration)
                },
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.error) {
                        $.notify(data.message, "warning");
                    } else {
                        var rows = [];

                        $.each(data.students, function (key, valueObj) {
                            console.log(valueObj);
                            let studentFullName = [valueObj.first_name, valueObj.middle_name, valueObj.last_name].filter(Boolean).join(' ');
                            let fatherFullName = [valueObj.father_first_name, valueObj.father_middle_name, valueObj.father_last_name].filter(Boolean).join(' ');
                            console.log(valueObj); 
                            rows.push([
                                '<input type="checkbox" name="chkIds[]" value="' + valueObj.id + '" class="ace chkstd" /><span class="lbl"></span>',
                                studentFullName,
                                fatherFullName,
                                valueObj.gender,
                                valueObj.reg_date ? valueObj.reg_date.split(" ")[0] : "-",
                                valueObj.degrees[3] 
                                    ? Math.round(valueObj.degrees[3].obtained_mark) + '/' + Math.round(valueObj.degrees[3].total_marks) 
                                    : "-",

                                valueObj.degrees[1] 
                                    ? Math.round(valueObj.degrees[1].obtained_mark) + '/' + Math.round(valueObj.degrees[1].total_marks) 
                                    : "-",

                                valueObj.degrees[2] 
                                    ? Math.round(valueObj.degrees[2].obtained_mark) + '/' + Math.round(valueObj.degrees[2].total_marks) 
                                    : "-",
                                getAgregate(valueObj),
                                '<div class="btn-group">' +
                                    '<a class="btn btn-info btn-minier btn-mark-single" data-id="' + valueObj.id + '" title="Mark"><i class="ace-icon fa fa-check"></i></a> ' +
                                    '<a target="_blank" class="btn btn-primary btn-minier" href="/student/' + valueObj.encrypted_id + '/view" title="Profile"><i class="ace-icon fa fa-user"></i></a>' +
                                '</div>'
                            ]);
                        });

                        // Clear and populate datatable
                        tbl1.clear().rows.add(rows).draw();
                    }
                }

            });
        }

    </script>

@endsection