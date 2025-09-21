@extends('layouts.master')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    
    <style>
        @media (max-width: 767px) {
            .hide-on-mobile {
                display: none !important;
            }
            
            .address-on-mobile
            {
                font-size: 1em;
            }
        }
        /* .card {
            border-radius: 10px;
            border: none;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .card-header {
            font-size: 16px;
            font-weight: 600;
            padding: .75rem 1rem;
            background: linear-gradient(90deg, #4e73df, #1cc88a);
            color: #fff;
            display: flex;
            align-items: center;
        }

        .card-header i {
            margin-right: 8px;
        }

        .card-body {
            background: #fff;
            padding: 1.5rem;
        }

        .form-group label {
            font-weight: 500;
            color: #4e4e4e;
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #d1d3e2;
            transition: all .3s ease;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78,115,223,.25);
        }

        .section-label {
            font-size: 14px;
            font-weight: 600;
            color: #f6c23e;
            background: #fff8e1;
            padding: 6px 12px;
            border-radius: 6px;
            margin: 10px 0;
            display: inline-block;
        } */

    </style>
    
@endsection

@section('content')

    @if(isset($data['registration_setting']) & $data['registration_setting'] != null)

        @if($data['registration_setting']->status=='active' && date('Y-m-d') >= $data['registration_setting']->start_date && $data['registration_setting']->end_date >= date('Y-m-d'))
            <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="row">
                        <div class="col-xs-12 ">
                        <!-- PAGE CONTENT BEGINS -->
                            <div class="row">
                                <div class="col-md-2 col-print-2 align-left">
                                        @if($data['registration_setting']->logo !=='')
                                            <img id=""  src="{{ asset('images/setting/online-registration/'.$data['registration_setting']->logo) }}" height="100" >
                                        @else
                                            <img id=""  src="{{ asset('images/setting/general/'.$generalSetting->logo) }}" height="100" >
                                        @endif
                                </div>

                                <div class="col-md-10 col-print-10 align-center">
                                    <div class="text-center">
                                        <h2 class="no-margin-top text-uppercase hide-on-mobile" style="font-family: 'Raleway'; font-size: 35px;font-weight: 600;">
                                            {{isset($generalSetting->institute)?$generalSetting->institute . ", " . $generalSetting->salogan ?? "" :"Frontier Children Academy Online Registration Portal"}}
                                        </h2>
                                        <h4 class="no-margin-top address-on-mobile">
                                            {{isset($generalSetting->address)?$generalSetting->address:""}}, {{isset($generalSetting->phone)?$generalSetting->phone:""}}, {{isset($generalSetting->email)?$generalSetting->email:""}}
                                        </h4>
                                        <h3 class="text-uppercase no-margin-top" style="font-family: 'Raleway'; font-size: 30px;font-weight: 600;">
                                            {{isset($data['registration_setting']->title)?$data['registration_setting']->title:'ONLINE APPLICATION FOR ADMISSION'}}
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            @include('includes.validation_error_messages')
                                @if(isset($data['registration_setting']->registration_guidelines))
                                    <div class="row">
                                        <div id="faq-list-4" class="panel-group accordion-style1 accordion-style2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <a href="#registraton-guidelines" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
                                                        <i class="ace-icon fa fa-arrow-down"></i> Registration Guidelines
                                                    </a>
                                                </div>

                                                <div class="panel-collapse collapse" id="registraton-guidelines" style="height: 0px;">
                                                    <div class="panel-body">
                                                        {!! $data['registration_setting']->registration_guidelines !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    {!! Form::open(['route' => 'student.online-registration.register', 'method' => 'POST','onSubmit' => 'return registrationValidation()', 'class' => 'form-horizontal',
                                        'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!}
                                    @include($view_path.'.includes.form')
                                        <div class="clearfix form-actions">
                                            <div class="col-md-12 align-center">
                                                <a onclick="validateRegistrationForm()" class="btn btn-warning btn-validate">Validate</a>
                                                <button class="btn btn-primary" disabled type="submit" value="Save" name="add_student" id="add-student">
                                                    <i class="fa fa-save bigger-110"></i>
                                                    Submit
                                                </button>
                                            </div>
                                        </div>

                                    <div class="hr hr-24"></div>
                                {!! Form::close() !!}
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div>
        @else
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="row">
                            <div class=" col-md-12 center">
                                <h1 class="">
                                    {!! $data['registration_setting']->registration_close_message !!}
                                </h1>
                                <hr class="hr-2">
                                @if(isset($generalSetting->logo))
                                    <img src="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$generalSetting->logo) }}" width="100px">
                                @endif

                                <h6 class="no-margin-top" style="font-size: 14px">
                                    {{isset($generalSetting->salogan)?$generalSetting->salogan:""}}
                                </h6>
                                <h2 class="no-margin-top text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
                                    <strong>{{isset($generalSetting->institute)?$generalSetting->institute . " " . $generalSetting->salogan ?? "":""}}</strong>
                                </h2>
                                <h5 class="no-margin-top" style="font-size: 16px;">
                                    {{isset($generalSetting->address)?$generalSetting->address:""}}, {{isset($generalSetting->phone)?$generalSetting->phone:""}}
                                </h5>
                                <h5 class="no-margin-top" style="font-size: 16px;">
                                    {{isset($generalSetting->email)?$generalSetting->email:""}}, {{isset($generalSetting->website)?$generalSetting->website:""}}
                                </h5>
                            </div>
                        </div>
                    </div><!-- /.page-content -->
                </div>
            </div>
    @endif

    @else
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="row">
                                <div class="center">
                                    <h1 class="">REGISTRATION NOT AVAILABLE AT THIS MOMENT</h1>
                                    <hr class="hr-2">
                                    @if(isset($generalSetting->logo))
                                        <img src="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$generalSetting->logo) }}" width="100px">
                                    @endif

                                        <h6 class="no-margin-top" style="font-size: 14px">
                                            {{isset($generalSetting->salogan)?$generalSetting->salogan:""}}
                                        </h6>
                                        <h2 class="no-margin-top text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
                                            <strong>{{isset($generalSetting->institute)?$generalSetting->institute:""}}</strong>
                                        </h2>
                                        <h5 class="no-margin-top" style="font-size: 16px;">
                                            {{isset($generalSetting->address)?$generalSetting->address:""}}, {{isset($generalSetting->phone)?$generalSetting->phone:""}}
                                        </h5>
                                        <h5 class="no-margin-top" style="font-size: 16px;">
                                            {{isset($generalSetting->email)?$generalSetting->email:""}}, {{isset($generalSetting->website)?$generalSetting->website:""}}
                                        </h5>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div>
    @endif

@endsection

@section('js')

    @include('includes.scripts.jquery_validation_scripts')
    @include('includes.scripts.datepicker_script')
    <!-- @include('includes.scripts.inputMask_script') -->
    @include($view_path.'.includes.student-common-script')
    {{--    @include('student.registration.includes.student-common-script')--}}
    <script type="text/javascript">
        
        // if(!ace.vars['touch']) {
        //     $('#chosen-multiple-style .btn').on('click', function(e){
        //         var target = $(this).find('input[type=radio]');
        //         var which = parseInt(target.val());
        //         if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
        //         else $('#form-field-select-4').removeClass('tag-input-style');
        //     });
        // }

        $(document).ready(function () {
            //date
            $('#date_of_birth').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom",
                endDate: new Date(new Date().setFullYear(new Date().getFullYear() - 17)) // today - 17 years
            });
            
            
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!

            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
            }
            if(mm<10){
                mm='0'+mm;
            }
            var today = yyyy +'-'+mm+'-'+ dd;
            $("#reg_date").val( today );
            $(".reg_date").val( today );
            //$(".input-mask-mobile").inputmask("0399-9999999");
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
            /*enddate*/
        });
        
        $("body").on("change", ".calculate-percent" ,function () {
            $obtainMark = $(this).closest('tr').find('.mark-obtained').val();
            $maximumMark = $(this).closest('tr').find('.maximum-mark').val();
            $percentage = (($obtainMark * 100) / $maximumMark).toFixed(2);
            $(this).closest('tr').find('.percent-value').val($percentage);
        });


    </script>
@endsection

