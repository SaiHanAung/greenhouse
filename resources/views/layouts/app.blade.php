<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Green House-สร้างบัญชีใหม่</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/slidercaptcha.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/switch.css') }}" rel="stylesheet">    -->

</head>
<body style="background-color: #DFEEEA;">
    <style>
        .navbar-green {
            background-color: #24C48E;
        }
        .font {
            color: #fff;
        }
        .font:hover {
            color: #fff;
        }
        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        
        .slidercaptcha {
            margin: 0 auto;
            width: 314px;
            height: 286px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.125);
            margin-top: 40px;
        }
        
        .slidercaptcha .card-body {
            padding: 1rem;
        }
        
        .slidercaptcha canvas:first-child {
            border-radius: 4px;
            border: 1px solid #e6e8eb;
        }
        
        .slidercaptcha.card .card-header {
            background-image: none;
            background-color: rgba(0, 0, 0, 0.03);
        }
        
        .refreshIcon {
            top: -54px;
        }
    </style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-green shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="javascript:void(0)" style="color: #fff;">
                    Green House
                </a>
                <button class="navbar-toggler font" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color: #D8EBB5;">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" style="color: #D8EBB5;">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="color: #fff;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link font" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link font" href="{{ route('register') }}">{{ __('') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/longbow.slidercaptcha.min.js') }}"></script>
    <script>
        var captcha = sliderCaptcha({
            id: 'captcha',
            localImages: function () {
                return Math.round(Math.random() * 4) + '.jpg';
            },
            onSuccess: function() {
                // var handler = setTimeout(function() {
                //     window.clearTimeout(handler);
                //     // captcha.reset();
                // }, 1000);
                document.getElementById('verify_identity').value = 'success';
                $('.slidercaptcha').fadeOut(1000)
                $('.invalid-feedback').fadeOut(1000);
            }
        });
    </script>
</body>
</html>
