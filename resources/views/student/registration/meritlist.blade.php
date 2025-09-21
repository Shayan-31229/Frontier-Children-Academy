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
                            Students Merit List
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{ __('form_fields.student.fields.faculty')}}</label>
                            <div class="col-sm-8">
                                {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control chosen-select', 'onchange' => "loadStudents(this)"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center bttons">
                            @include('student.registration.includes.meritlistbuttons')
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
                                        <th> KMU CAT </th>
                                        <th> Matric </th>
                                        <th> FA/FSc </th>
                                        <th> Interview </th>
                                        <th> Agregate </th>
                                        <th> <button class="btn-success btn p-1 btn-sm pull-left btn-repeat-date"
                                                title="Repeat the date of first row in all the checked records"><i
                                                    class="fa fa-paste"></i> Date</button> Action </th>
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
            $(".btn-repeat-date").click(function () {
                //var firstDate = $(".tbl-students tbody tr ")
                var dateValue = $('.tbl-students tbody tr').has('input[type="checkbox"]:checked').first().find('.txtDate').val();
                //alert(dateValue);
                if (dateValue == "") {
                    toastr.error("Please enter date in the first selected student");
                    $('.tbl-students tbody tr').has('input[type="checkbox"]:checked').first().find('.txtDate').focus();
                    return false;
                }
                $('.tbl-students tbody tr').has('input[type="checkbox"]:checked').each(function (i, k) {
                    $(this).find(".txtDate").val(dateValue);
                });

            });


            $(document).on('change', '.chk-all', function () {
                const isChecked = this.checked;
                $('.tbl-students tbody .chkstd').prop('checked', isChecked);
            });
            
            // $(document).on("change", "select[name='faculty']", function () {
            //     loadStudents(this);
            // });

            /* keep the master checkbox in sync with individual selections */
            $(document).on('change', '.tbl-students tbody .chkstd', function () {
                const total = $('.tbl-students tbody .chkstd').length;
                const selected = $('.tbl-students tbody .chkstd:checked').length;
                $('.chk-all').prop('checked', total === selected);
            });

            $("body").on("click", ".btn-mark-single", function (e) {
                e.preventDefault();
                var stds = [];
                var date = $(this).parents("td").find(".txtDate").val();
                stds.push({ "id": $(this).data("id"), "date": date });
                NotifyStudent(stds);
            });

            $("body").on("click", ".btn-notify-all", function (e) {
                e.preventDefault();
                var stds = [];
                var hasError = false;
                $('.tbl-students tbody tr').has('input[type="checkbox"]:checked').each(function (i, k) {
                    if ($(this).find(".txtDate").val() == "") {
                        toastr.error("Date with all selected students must be provided");
                        hasError = true;
                        $(this).find(".txtDate").focus();
                        return false;
                    }
                });
                if (hasError) return; // stop further execution


                $(".tbl-students tbody tr").each(function (i, k) {
                    if ($(this).find(".chkstd").is(":checked")) {
                        var date = $(this).find(".txtDate").val();
                        var thisid = $(this).find(".btn-mark-single").data("id");
                        stds.push({ "id": thisid, "date": date });
                    }
                });
                NotifyStudent(stds);
            });

            $(".btn-drop-all").click(function(e) {
                e.preventDefault();
                var stds = [];

                $(".tbl-students tbody tr").each(function (i, k) {
                    if ($(this).find(".chkstd").is(":checked")) {
                        var thisid = $(this).find(".btn-mark-single").data("id");
                        stds.push({ "id": thisid });
                    }
                });
                if(stds.length == 0)
                {
                    toastr.error("Please select at least one student");
                    return;
                }
                
                DropStudent(stds);
            });

        });


        function DropStudent(stds)
        {
            console.log(stds);
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

        function NotifyStudent(stds) {
            $.ajax({
                type: 'POST',
                url: '{{ route('student.notifystudent') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    stds: stds
                },
                success: function (response) {
                    var data = response;
                    if (data.error) {
                        $.notify(data.message, "warning");
                    } else {
                        $.each(stds, function (i, std) {
                            $(".tbl-students tbody tr .btn-mark-single[data-id='" + std.id + "']").parents("tr").remove();
                        });
                        toastr.success(data.message);
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
                    status: 10  //meritlist (Online Registration)
                },
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.error) {
                        $.notify(data.message, "warning");
                    } else {
                        var str = "";
                        $(".lblmaxstudents").html(
                            data.selected_students + " of " + data.max_students + " students selected"
                        );

                        $.each(data.students, function (key, valueObj) {
                            let studentFullName = [valueObj.first_name, valueObj.middle_name, valueObj.last_name].filter(Boolean).join(' ');
                            let fatherFullName = [valueObj.father_first_name, valueObj.father_middle_name, valueObj.father_last_name].filter(Boolean).join(' ');

                            str += '<tr>';
                            str += '<td class="text-center"><input type="checkbox" name="chkIds[]" value="' + valueObj.id + '" class="ace chkstd" /><span class="lbl"></span></td>';
                            str += '<td>' + studentFullName + '</td>';
                            str += '<td>' + fatherFullName + '</td>';
                            str += '<td>' + valueObj.gender + '</td>';
                            str += '<td>' + (valueObj.degrees[3] ? Math.round(valueObj.degrees[3].obtained_mark) + '/' + Math.round(valueObj.degrees[3].total_marks) : "") + '</td>';
                            str += '<td>' + (valueObj.degrees[1] ? Math.round(valueObj.degrees[1].obtained_mark) + '/' + Math.round(valueObj.degrees[1].total_marks) : "") + '</td>';
                            str += '<td>' + (valueObj.degrees[2] ? Math.round(valueObj.degrees[2].obtained_mark) + '/' + Math.round(valueObj.degrees[2].total_marks) : "") + '</td>';
                            str += '<td>' + valueObj.interview_marks + '</td>';
                            str += '<td>' + getAgregate(valueObj) + '</td>';
                            str += '<td><input type="date" class="txtDate" /> <a class="btn-info btn-sm btn-mark-single" data-id="' + valueObj.id + '">Notify</a> <a target="_blank" class="btn-primary btn-sm" href="/student/' + valueObj.encrypted_id + '/view">Profile</a></td>';
                            str += '</tr>';
                        });

                        $(".tbl-students tbody").html(str);
                    }
                }
            });
        }
        

    </script>

@endsection