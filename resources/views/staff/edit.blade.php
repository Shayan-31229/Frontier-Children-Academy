@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.custom.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />
@endsection
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                @include('layouts.includes.template_setting')
                <div class="page-header">
                    <h1>
                        @include($view_path.'.includes.breadcrumb-primary')
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Edit {{$panel}}
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-xs-12">
                        @include($view_path.'.includes.buttons')
                        @include('includes.flash_messages')
                        <!-- PAGE CONTENT BEGINS -->
                        @include('includes.validation_error_messages')
                        <div class="align-right hidden-print">
                            <a class="btn-primary btn-sm" href="{{ route($base_route.'.view', ['id' => encrypt($data['row']->id)]) }}"  >
                                <i class="ace-icon fa fa-eye"></i> View Staff Profile
                            </a>
                        </div>

                        {!! Form::model($data['row'], ['route' => [$base_route.'.update', encrypt($data['row']->id)], 'method' => 'POST', 'class' => 'form-horizontal',
                   'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!}
                        {!! Form::hidden('id', encrypt($data['row']->id)) !!}
                       {{-- {!! Form::text('address_id', $data['row']->address_id) !!}
                        {!! Form::text('parents_id', $data['row']->parents_id) !!}
                        {!! Form::text('guardian_id', $data['row']->guardian_id) !!}--}}
                        @include($view_path.'.includes.form')
                        <div class="clearfix form-actions">
                            <div class="col-md-12 align-right">
                                <button class="btn btn-info" type="submit">
                                    <i class="fa fa-save bigger-110"></i>
                Update
                                </button>
                            </div>
                        </div>
                        <div class="hr hr-24"></div>
                        {!! Form::close() !!}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


@endsection

@section('js')
    @include('includes.scripts.jquery_validation_scripts')
    <!-- inline scripts related to this page -->

    @include('staff.includes.staff-common-script')
    @include('includes.scripts.inputMask_script')
    @include('includes.scripts.datepicker_script')
    <script>
        $(document).ready(function(){
            $(".input-mask-mobile").inputmask("0399-9999999")
            if (/Mobi|Android/i.test(navigator.userAgent)) {
                document.addEventListener("DOMContentLoaded", function() {
                    const cnicField = document.getElementById("cnic_no");
                
                    cnicField.addEventListener("input", function(e) {
                        let value = e.target.value.replace(/\D/g, ""); // digits only
                
                        if (value.length > 13) {
                            value = value.substr(0, 13);
                        }
                
                        // Apply CNIC format: 5-7-1 digits
                        let formatted = value;
                        if (value.length > 5) {
                            formatted = value.substr(0, 5) + '-' + value.substr(5);
                        }
                        if (value.length > 12) {
                            formatted = formatted.substr(0, 13) + '-' + formatted.substr(13);
                        }
                
                        e.target.value = formatted;
                    });
                });
                
                
            } else {
                $("#cnic_no").inputmask("9999999999999");
            }
        });
    </script>
@endsection


