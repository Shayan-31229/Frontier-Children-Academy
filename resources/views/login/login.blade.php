<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>
        @if(isset($data['general_setting']->institute))
            {{$data['general_setting']->institute}}
        @else
            Frontier Children Academy
        @endif
    </title>

    <meta name="description" content="FCA Education System & Information Management System. School/Academ can manage student & staff detail with the different helpful module. Front Desk, Student & Staff, Account, Library, Hostel, Attendance, Transport, Assignment, Download, Zoom Meeting, SMS & Email Alert, Online Payment Gateway, User and Role manage with powerful ACL are the Key features of Frontier Children Academy MIS." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @if(isset($data['general_setting']->favicon))
        <link rel="icon" href="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$data['general_setting']->favicon ) }}" type="image/x-icon" />
    @endif

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-part2.min.css') }}" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.min.css') }}" />
    <![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->

    <style>
        /* Base Styles */
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            max-width: 450px;
            width: 100%;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
        }
        
        .login-header {
            text-align: center;
            padding: 30px 20px 20px;
            background: linear-gradient(to right, #4e73df, #3b60d1);
            color: white;
        }
        
        .login-header img {
            max-width: 180px;
            margin-bottom: 15px;
        }
        
        .login-header h1 {
            font-size: 24px;
            margin: 10px 0 5px;
            font-weight: 600;
        }
        
        .login-header p {
            font-size: 16px;
            opacity: 0.9;
            margin: 0;
        }
        
        .tab-container {
            display: flex;
            border-bottom: 1px solid #eaeaea;
        }
        
        .tab {
            flex: 1;
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            color: #6c757d;
        }
        
        .tab.active {
            background: white;
            color: #4e73df;
            border-bottom: 3px solid #4e73df;
        }
        
        .tab-content {
            padding: 30px;
        }
        
        .tab-pane {
            display: none;
        }
        
        .tab-pane.active {
            display: block;
            animation: fadeIn 0.5s ease-out;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s;
            font-size: 15px;
        }
        
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(to right, #4e73df, #3b60d1);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            font-size: 16px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 8px;
        }
        
        .forgot-password {
            color: #4e73df;
            text-decoration: none;
            font-size: 14px;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        
        .text-danger {
            color: #e74a3b !important;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
        
        .floating-menu {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 15px;
            z-index: 1000;
            animation: fadeIn 0.8s ease-out;
        }
        
        .floating-menu h3 {
            font-size: 16px;
            margin: 0 0 10px;
            color: #4e73df;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
        }
        
        .floating-menu a {
            display: block;
            padding: 8px 0;
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }
        
        .floating-menu a:hover {
            color: #4e73df;
        }
        
        .login-footer {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            color: #6c757d;
            font-size: 14px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 576px) {
            .login-container {
                max-width: 100%;
            }
            
            .floating-menu {
                display: none;
            }
            
            .tab-container {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            @if(isset($data['general_setting']->logo))
                <a href="{{isset($data['general_setting']->website)?$data['general_setting']->website:'#'}}">
                    <img id="avatar" src="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$data['general_setting']->logo) }}">
                </a>
            @else
                <i class="ace-icon fa fa-3x fa-graduation-cap" style="color: white;"></i>
            @endif
            
            <h1>
                @if(isset($data['general_setting']->institute))
                    {{$data['general_setting']->institute}}
                @else
                    Frontier Children Academy
                @endif
            </h1>
            <p>{{ViewHelper::getGreeting()}}</p>
        </div>
        
        <div class="tab-container">
            <div class="tab active" data-tab="login">Login</div>
            <div class="tab" data-tab="forgot">Forgot Password</div>
        </div>
        
        <div class="tab-content">
            <!-- Login Tab -->
            <div class="tab-pane active" id="login-tab">
                @include('includes.flash_messages')
                
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    
                    @if(session()->has('login_error'))
                        <div class="alert alert-danger">
                            {{ session()->get('login_error') }}
                        </div>
                    @endif
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="remember-forgot">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                        <a href="#" class="forgot-password" id="show-forgot-tab">Forgot Password?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="ace-icon fa fa-sign-in"></i> Login
                    </button>
                </form>
                
                @if($data['general_setting']->public_registration == 1)
                    <div style="text-align: center; margin-top: 20px;">
                        <a href="{{ route('online-registration.registration') }}" style="color: #4e73df; text-decoration: none;">
                            <i class="ace-icon fa fa-user-plus"></i> Student Registration
                        </a>
                    </div>
                @endif
            </div>
            
            <!-- Forgot Password Tab -->
            <div class="tab-pane" id="forgot-tab">
                <h4 style="color: #4e73df; margin-bottom: 15px;">
                    <i class="ace-icon fa fa-key"></i> Retrieve Password
                </h4>
                
                <p style="color: #6c757d; margin-bottom: 20px;">
                    Enter your email to receive password reset instructions
                </p>
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="ace-icon fa fa-paper-plane"></i> Send Reset Link
                    </button>
                </form>
                
                <div style="text-align: center; margin-top: 20px;">
                    <a href="#" class="forgot-password" id="show-login-tab">
                        <i class="ace-icon fa fa-arrow-left"></i> Back to Login
                    </a>
                </div>
            </div>
        </div>
        
        <div class="login-footer">
            @if(isset($data['general_setting']->copyright))
                {!! $data['general_setting']->copyright !!}
            @else
                <a href="http://alampk.com" target="_blank" style="color: #4e73df;">©Cyber Arts</a>
            @endif
        </div>
    </div>
    
    @if($data['general_setting']->quick_menu == 1)
        <div class="floating-menu">
            <h3>Quick Menu</h3>
            @if($data['general_setting']->public_registration == 1)
                <a href="{{ route('online-registration.registration') }}">Student Registration</a>
            @endif
            <a href="{{ route('online-registration.find') }}">Find Registration</a>
            <a href="{{ route('verification.certificate') }}">Certificate Verification</a>
        </div>
    @endif

    <!-- basic scripts -->
    <!--[if !IE]> -->
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <!-- <![endif]-->

    <!--[if IE]>
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <![endif]-->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Tab switching functionality
            $('.tab').click(function() {
                var tabId = $(this).data('tab');
                
                // Update active tab
                $('.tab').removeClass('active');
                $(this).addClass('active');
                
                // Show corresponding content
                $('.tab-pane').removeClass('active');
                $('#' + tabId + '-tab').addClass('active');
            });
            
            // Forgot password link
            $('#show-forgot-tab').click(function(e) {
                e.preventDefault();
                $('.tab').removeClass('active');
                $('.tab[data-tab="forgot"]').addClass('active');
                
                $('.tab-pane').removeClass('active');
                $('#forgot-tab').addClass('active');
            });
            
            // Back to login link
            $('#show-login-tab').click(function(e) {
                e.preventDefault();
                $('.tab').removeClass('active');
                $('.tab[data-tab="login"]').addClass('active');
                
                $('.tab-pane').removeClass('active');
                $('#login-tab').addClass('active');
            });
        });
    </script>
</body>
</html>