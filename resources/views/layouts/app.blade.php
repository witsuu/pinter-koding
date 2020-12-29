<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }} />
    <meta name="viewport" content="width=device-width" , intial-scale="1" />
    <script src={{ asset('assets/js/jquery.js') }}></script>
    <title>@yield('title') - PinterCoding</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>

<body>
    <div class="nav p-lr-null pos-sticky">
        <div class="container align-c just-beetwen">
            <a class="link" href="{{ route('home') }}"> <span>PinterCoding</span> </a>
            <ul class="listDesktop d-flex pad mr-auto flex-row">
                <li class="mb-null"><a href="php.html">PHP</a></li>
                <li class="mb-null"><a href="java.html">Java</a></li>
                <li class="mb-null"><a href="python.html">Python</a></li>
                <li class="mb-null"><a href="javascript.html">Javascript</a></li>
                <li class="mb-null" style="cursor:default;">|</li>
                <li class="mb-null">
                    <a href="{{ route('tutorial') }}" target="_blank">Lainnya</a>
                </li>
            </ul>
            <a href="{{route('admin')}}">
                <button class="tombolsearch1" type="button">
                    Admin Panel
                </button>
            </a>
            <ul class="listDesktop1 d-none flex-row just-beetwen mt w-100"
                style="padding-inline-start: 0;flex-wrap: wrap">
                <li class="mb-null"><a href="php.html">PHP</a></li>
                <li class="mb-null"><a href="java.html">Java</a></li>
                <li class="mb-null"><a href="javascript.html">Javascript</a></li>
                <li class="mb-null">
                    <a href="#" target="_blank">Lainnya</a>
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
