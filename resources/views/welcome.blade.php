<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if(isset($generalSetting->institute))
            {{$generalSetting->institute}}
        @else
            Frontier Children Academy (FCA)
        @endif
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/hover-min.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 50pt;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 11pt;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        /* For mobile phones: */
        [class*="col-"] {
            width: 100%;
        }

        .hvr-sweep-to-right {
            border-radius: 30px !important;
            overflow: hidden;
            /* ensures hover background respects rounding */
        }

        .hvr-sweep-to-right:before {
            border-radius: 30px !important;
        }

        /* Breathing animation */
        @keyframes breathing {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            }

            50% {
                transform: scale(1.08);
                box-shadow: 0 0 20px rgba(72, 239, 128, 0.6);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            }
        }

        .btn-breathing {
            animation: breathing 2.5s ease-in-out infinite;
        }


        @media only screen and (max-width: 600px) {

            /* For tablets: */
            .col-s-1 {
                width: 8.33%;
            }

            .col-s-2 {
                width: 16.66%;
            }

            .col-s-3 {
                width: 25%;
            }

            .col-s-4 {
                width: 33.33%;
            }

            .col-s-5 {
                width: 41.66%;
            }

            .col-s-6 {
                width: 50%;
            }

            .col-s-7 {
                width: 58.33%;
            }

            .col-s-8 {
                width: 66.66%;
            }

            .col-s-9 {
                width: 75%;
            }

            .col-s-10 {
                width: 83.33%;
            }

            .col-s-11 {
                width: 91.66%;
            }

            .col-s-12 {
                width: 100%;
            }

            .title {
                font-size: 25pt;
            }

            .links>a {
                font-size: 8pt;
            }

        }

        @media (max-width: 1000px) {
            .links a {
                font-size: 0.85rem !important;
                padding: 8px 12px !important;
                display: inline-block;
            }

            .links {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }
        }
    </style>
</head>

<body style="font-family: 'Raleway', sans-serif;">

    <div class="d-flex align-items-center justify-content-center vh-100" style="
         background: url('images/bodybg.jpg') no-repeat center center;
         background-size: cover;
         position: relative;">

        <!-- Dark overlay to improve text contrast -->
        <div style="
          position: absolute;
          top:0;
          left:0;
          width:100%;
          height:100%;
          background-color: rgba(0,0,0, 0.5);"></div>

        <div class="container text-center position-relative" style="z-index: 2; color: #fff;">

            @if(isset($data['general_setting']->logo))
                <img src="{{ asset('images/setting/general/' . $data['general_setting']->logo) }}" alt="Institute Logo"
                    class="img-fluid mb-4" style="max-width: 180px;">
            @endif

            <h1 class="display-4 font-weight-bold mb-3">
                {{ $generalSetting->institute ?? 'Frontier Children Academy' }}
            </h1>

            <h5 class="text-light mb-5">
                {{ isset(auth()->user()->name) ? 'Welcome, ' . auth()->user()->name : 'Your Future Starts Here' }}
            </h5>

            <div class="links mt-4">

                {{-- Online Registration (highlighted) --}}
                <a href="{{ route('online-registration.registration') }}"
                    class="btn btn-success mx-2 shadow hvr-sweep-to-right btn-breathing"
                    style="border-radius: 40px; font-weight: 700; font-size: 1.3rem; padding: 14px 20px;color:white;">
                    <i class="fa fa-pencil-square-o"></i> Online Registration
                </a>

                {{-- Login (highlighted) --}}
                <a href="{{ route('login') }}" class="btn btn-primary mx-1 shadow hvr-sweep-to-right"
                    style="border-radius: 40px; font-weight: 700; font-size: 1.1rem; padding: 14px 20px;color:white;">
                    <i class="fa fa-sign-in"></i> Login
                </a>

                {{-- Find Registration (lighter) --}}
                <a href="{{ route('online-registration.find') }}" class="btn btn-outline-light mx-1 hvr-sweep-to-right"
                    style="border-radius: 40px; font-weight: 600; font-size: 1rem; padding: 14px 20px; color:#e0e0e0;">
                    <i class="fa fa-search"></i> Find Registration
                </a>

                {{-- Certificate Verification (lighter) --}}
                <a href="{{ route('verification.certificate') }}" class="btn btn-outline-light mx-2 hvr-sweep-to-right"
                    style="border-radius: 40px; font-weight: 600; font-size: 1rem; padding: 14px 20px; color:#e0e0e0;">
                    <i class="fa fa-certificate"></i> Certificate Verification
                </a>
            </div>




            <div class="progress mt-5" style="height: 25px; background: rgba(255,255,255,0.3);">
                <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                    role="progressbar" style="width: 0%;">
                    Redirecting...
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('web.home') }}" class="btn btn-outline-light hvr-sweep-to-right px-4 py-2"
                    style="border-radius: 30px; font-weight: 600; font-size: 14px;">
                    <i class="fa fa-forward"></i> Skip & Go to Website
                </a>
            </div>

        </div>
    </div>

    <style>
        .shadow {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3) !important;
        }

        .hvr-pulse-grow {
            animation: pulse-grow 1.5s infinite;
        }

        @keyframes pulse-grow {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>

    <script>
        var i = 0;
        function move() {
            if (i === 0) {
                i = 1;
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 400);
                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                        window.location.href = "{{ route('web.home') }}";
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                }
            }
        }
        document.addEventListener("DOMContentLoaded", move);
    </script>

</body>

</html>