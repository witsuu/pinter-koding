<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link rel="icon" href="{{asset("admins/assets/images/favicon.ico")}}" type="image/x-icon">

    <!-- Plugins Core Css -->
    <link href="{{asset("admins/assets/css/app.min.css")}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset("admins/assets/css/style.css")}}" rel="stylesheet" />
    <link href="{{asset("admins/assets/css/pages/extra_pages.css")}}" rel="stylesheet" />
</head>

<body class="login-page">
    <div class="limiter">
        <div class="container-login100 page-background">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{route('admin.logged')}}">
                    @csrf
                    <span class="login100-form-logo">
                        <img alt="" src="{{asset("admins/assets/images/loading.png")}}">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100 @error('email') not valid @enderror" type="email" name="email"
                            placeholder="Email">
                        <i class="material-icons focus-input1001">email</i>
                    </div>
                    @error('email')
                    <strong>{{$message}}</strong>
                    @enderror
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100 @error('pass') not valid @enderror" type="password" name="password"
                            placeholder="Password">
                        <i class="material-icons focus-input1001">lock</i>
                    </div>
                    @error('password')
                    <strong>{{$message}}</strong>
                    @enderror
                    <div class="contact100-form-checkbox">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value=""> Remember me
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    @if (session()->has('error'))
                    <div class="bg-light w-100 text-center p-3 rounded mt-2" style="opacity: 0.8">
                        <strong class="text-danger">{{__(session()->get('error'))}}</strong>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <!-- Plugins Js -->

    <script src="{{asset("admins/assets/js/app.min.js")}}"></script>

    <!-- Extra page Js -->
    <script src="{{asset('admins/assets/js/pages/examples/pages.js')}}"></script>

</body>

</html>
