<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ asset('admins/assets/images/code-logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }} />
    <meta name="viewport" content="width=device-width" , intial-scale="1" />
    <script src={{ asset('assets/js/jquery.js') }}></script>
    <title>@yield('title') - PinterCoding</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bg-dark">
        <div class="container text-right" style="">
            <a href="{{ route('admin') }}" target="_blank" rel="noopener noreferrer" class="text-light">Admin Panel
                >></a>
        </div>
    </div>
    <div class="nav p-lr-null pos-sticky" style="background-color: #022b3a">
        <div class="container align-c just-beetwen">
            <a class="link" href="{{ route('home') }}"> <span>PinterCoding</span> </a>
            <ul class="listDesktop d-flex pad mr-auto flex-row">
                <li class="mb-null">
                    <a href="{{ route('tutorial') }}">Tutorial</a>
                </li>
            </ul>
            <ul class="listDesktop1 d-none flex-row just-beetwen mt w-100"
                style="padding-inline-start: 0;flex-wrap: wrap">
                <li class="mb-null">
                    <a href="#" target="_blank">Tutorial</a>
                </li>
            </ul>
        </div>
    </div>
    <section>
        @yield('content')
    </section>
    <div class="Footer baju">
        <div class="container">
            <div class="row flex-column">
                <div class="m-auto">
                    <i class="fab fa-facebook text-primary" style="font-size: 2.5em;margin: 0 10px 0 10px"></i>
                    <i class="fab fa-instagram text-danger" style="font-size: 2.5em;margin: 0 10px 0 10px"></i>
                    <i class="fab fa-twitter text-primary" style="font-size: 2.5em;margin: 0 10px 0 10px"></i>
                    <i class="fab fa-linkedin text-primary" style="font-size: 2.5em;margin: 0 10px 0 10px"></i>
                </div>
                <span class="text-center text-dark" style="font-size: 1.3em">@ {!!date('Y',time())!!}
                    <strong>PinterCoding</strong>
                    | Develop by
                    Witsudi</span>
            </div>
        </div>
    </div>
    <script src={{ asset('assets/js/script.js') }}></script>
</body>

</html>
