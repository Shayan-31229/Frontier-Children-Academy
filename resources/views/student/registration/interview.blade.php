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
                            Students ready for Interview
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
                                        <th> Details </th>
                                        <th> Student Name </th>
                                        <th> Father Name </th>
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

            $("body").on("click", ".btn-save-interview", function (e) {
                e.preventDefault();
                var stdid = $(this).data("id");
                var marks = $(this).parents("td").find(".txtmarks").val();
                var remarks = $(this).parents("td").find(".txtremarks").val();

                if(marks === ""){
                    $(this).parents("td").find(".txtmarks").focus();
                    toastr.error("Please provide marks to continue...");
                    return false;
                }

                marks = parseInt(marks, 10);
                if (marks < 0 || marks > 100 || marks == "") {
                    toastr.error("The mark should be between 0 and 100");
                    return false;
                }

                if(remarks == ""){
                    $(this).parents("td").find(".txtremarks").focus();
                    toastr.error("Please provide remarks to continue...");
                    return false;
                }
                
                var std = { "id": stdid, "marks": marks, "remarks": remarks };

                SaveInterviewMarks(std);
            });
        });

        function SaveInterviewMarks(std) {
            $.ajax({
                type: 'POST',
                url: '{{ route('student.saveinterviewmarks') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    std: std
                },
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.error) {
                        $.notify(data.message, "warning");
                    } else {
                        $(".tbl-students tbody tr .btn-save-interview[data-id='" + std.id + "']").parents("tr").remove();
                        toastr.success("Student interview marks saved");
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
                    status: 9   //scrutiny (Online Registration)
                },
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.error) {
                        $.notify(data.message, "warning");
                    } else {
                        var str = ""
                        var rows = [];
                        $.each(data.students, function (key, valueObj) {
                            let studentFullName = [valueObj.first_name, valueObj.middle_name, valueObj.last_name].filter(Boolean).join(' ');
                            let fatherFullName = [valueObj.father_first_name, valueObj.father_middle_name, valueObj.father_last_name].filter(Boolean).join(' ');
                            rows.push([
                                '<input type="checkbox" name="chkIds[]" value="' + valueObj.id + '" class="ace chkstd" /><span class="lbl"></span>',
                                valueObj.gender,
                                studentFullName,
                                fatherFullName,
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
                                '<div class="btn-group" style="display:flex; align-items:center; gap:6px;">' +
                                '<input type="number" required class="form-control input-sm txtmarks" ' +
                                'style="width:70px;" placeholder="Marks">' +
                                '<input type="text" required class="form-control input-sm txtremarks" style="width:160px;" placeholder="Remarks">' +
                                '<a class="btn btn-success btn-sm btn-save-interview" data-id="' + valueObj.id + '" title="Save">' +
                                '<i class="ace-icon fa fa-check"></i>' +
                                '</a>' +
                                '<a target="_blank" class="btn btn-primary btn-sm" href="/student/' + valueObj.encrypted_id + '/view" title="Profile">' +
                                '<i class="ace-icon fa fa-user"></i>' +
                                '</a>' +
                                '</div>'
                            ]);
                            //console.log(valueObj);
                        });
                        // Clear and populate datatable
                        tbl1.clear().rows.add(rows).draw();
                    }
                }
            });
        }

    </script>

@endsection