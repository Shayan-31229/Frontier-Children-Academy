@extends('layouts.master')

@section('css')
    <style>

       /* .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 1px solid #444 !important;
            padding: 0px 3px 0px 5px;
        }
*/
        #backToTop {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            border-radius: 50%;
            padding: 12px 15px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            width: auto;      
            height: auto;     
            line-height: 1.2; 
        }

        /* Prevent Bootstrap from expanding button on click */
        #backToTop:focus,
        #backToTop:active {
            outline: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3); /* subtle effect only */
            width: auto !important;
            height: auto !important;
        }

        @media print {

            body {
                margin-top: 6mm; margin-bottom: 6mm;
                margin-left: 12.7mm; margin-right: 6mm
            }

            @page{
                /*margin-left: 100px !important;*/
                /* margin: 500px !important;*/
            }

            .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
                border: 0.5px solid #7e7d7d1c !important;

            }

            span.receipt-copy {
                font-size: 22px;
                font-weight: 600;
                /*background: black;
                color: white;*/
                padding: 3px 15px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                @include('layouts.includes.template_setting')
                <div class="page-header hidden-print">
                    <h1>
                        Student
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Detail
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12 ">
                    @include($view_path.'.includes.buttons')
                    @include('includes.flash_messages')
                    @include('includes.validation_error_messages')
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="space-2"></div>

                        <div id="user-profile-2" class="user-profile">
                            <div class="tabbable tabs-left">
                                <ul class="nav nav-tabs padding-18 hidden-print">
                                    <li class="active">
                                        <a data-toggle="tab" href="#profile">
                                            <i class="green ace-icon fa fa-user bigger-140"></i>
                                            Profile
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#academicInfo">
                                            <i class="green ace-icon fa fa-university bigger-140"></i>
                                            Academic
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#extrainfo">
                                            <i class="blue ace-icon fa fa-list-alt bigger-140"></i>
                                            ExtraInfo
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#fees">
                                            <i class="orange ace-icon fa fa-calculator bigger-140"></i>
                                            Fees
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#library">
                                            <i class="purple ace-icon fa fa-book bigger-140"></i>
                                            Library
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#attendance">
                                            <i class="blue ace-icon fa fa-calendar bigger-140"></i>
                                            Attendance
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#examscore">
                                            <i class="blue ace-icon fa fa-line-chart bigger-140"></i>
                                            Exam
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#certificate">
                                            <i class="blue ace-icon fa fa-certificate bigger-140"></i>
                                            Certificate
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#hostel">
                                            <i class="blue ace-icon fa fa-bed bigger-140"></i>
                                            Hostel
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#transport">
                                            <i class="blue ace-icon fa fa-car bigger-140"></i>
                                            Transport
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#documents">
                                            <i class="pink ace-icon fa fa-files-o bigger-140"></i>
                                            Docs
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#notes">
                                            <i class="red ace-icon fa fa-sticky-note-o bigger-140"></i>
                                            Notes
                                        </a>
                                    </li>
                                    @ability('super-admin', 'user-add')
                                    <li>
                                        <a data-toggle="tab" href="#login-access">
                                            <i class="red ace-icon fa fa-key bigger-140"></i>
                                            Login Access
                                        </a>
                                    </li>
                                    @endability

                                </ul>

                                <div class="tab-content no-border padding-24">
                                        <div id="profile" class="tab-pane fade in active">
                                            <div class="row text-center">
                                                @include('print.includes.institution-detail')
                                                <h2 class="no-margin-top text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
                                                    <strong>REGISTRATION DETAIL</strong>
                                                </h2>
                                            </div>
                                            <hr class="hr-double hr-8">
                                           @include($view_path.'.detail.includes.profile')
                                        </div><!-- /#home -->

                                        <div id="academicInfo" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.academicInfo')
                                        </div><!-- /#AcademicInfo -->

                                        <div id="extrainfo" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.extrainfo')
                                        </div><!-- /#ExtraInfo -->

                                        <div id="fees" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.fees')
                                        </div><!-- /#home -->

                                        <div id="library" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.library')
                                        </div><!-- /#Library -->

                                        <div id="attendance" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.attendance')
                                        </div><!-- /#attendance -->

                                        <div id="examscore" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.examscore')
                                        </div><!-- /#examscore -->

                                        <div id="certificate" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.certificate')
                                        </div><!-- /#certificate -->

                                        <div id="hostel" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.hostel')
                                        </div><!-- /#Hostel -->

                                        <div id="transport" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.transport')
                                        </div><!-- /#Transport -->

                                        <div id="documents" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.documents')
                                        </div><!-- /#Documents -->

                                        <div id="notes" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.notes')
                                        </div><!-- /#Notes -->
                                        @ability('super-admin', 'user-add')
                                        <div id="login-access" class="tab-pane fade">
                                            @include($view_path.'.detail.includes.login-access')
                                        </div><!-- /#Login Detail -->
                                        @endability
                                    </div>
                            </div>

                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    </div>
    <a href="javascript:void(0)" id="backToTop" class="btn btn-primary">
        <i class="fa fa-arrow-up"></i>
    </a>
    <!-- <button id="backToTop" class="btn btn-primary" title="Go to top">
        
    </button> -->

@endsection

@section('js')
    <script>
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $($(e.target).attr("href")); // the active tab pane
            $('html, body').animate({
                scrollTop: target.offset().top - 70 // adjust 70px if you have a fixed navbar
            }, 400);
        });
        $('#backToTop').click(function () {
            // Reset all menu items
            $('.nav.nav-tabs li').removeClass('active');

            // Optionally, show the default tab again (e.g. Profile)
            $('.tab-pane').removeClass('in active'); // hide all
            $('#profile').addClass('in active');     // show profile again
            $('.nav.nav-tabs li:first').addClass('active'); // set first menu active
        });


        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#backToTop').fadeIn();
            } else {
                $('#backToTop').fadeOut();
            }
        });

        // Scroll to top on click
        $('#backToTop').click(function () {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });


        $('.bulk-action-btn').click(function () {
            $chkIds = document.getElementsByName('chkIds[]');
            var $chkCount = 0;
            $length = $chkIds.length;
            for (var $i = 0; $i < $length; $i++) {
                if ($chkIds[$i].type == 'checkbox' && $chkIds[$i].checked) {
                    $chkCount++;
                }
            }

            if ($chkCount <= 0) {
                toastr.info("Please, Select At Least One Record.", "Info:");
                return false;
            }

            var $this = $(this);
            var bulk_action = $this.attr('attr-action-type');
            var form = $('#bulk_action_form');
            $('#bulk_action_form').submit();

        });
    </script>
    <!-- inline scripts related to this page -->
    @include('includes.scripts.delete_confirm')
    @include('includes.scripts.bulkaction_confirm')
    {{--@include('includes.scripts.dataTable_scripts')--}}
    {{--@include('includes.scripts.paymentgateway.khalti')--}}
@endsection