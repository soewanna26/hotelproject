<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Dashboard</h1>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form action="{{ route('account.processRegister') }}" method="post">
                                    @csrf
                                    <div class="form-group-material">
                                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                                            data-msg="Please enter your username"
                                            class="input-material @error('name')
                                            is-invalid
                                        @enderror">
                                        <label for="name" class="label-material">Username</label>
                                        @error('name')
                                            <p class="invalid-feedback" style="display: block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group-material">
                                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                            data-msg="Please enter your username"
                                            class="input-material @error('phone')
                                            is-invalid
                                        @enderror">
                                        <label for="phone" class="label-material">Phone</label>
                                        @error('phone')
                                            <p class="invalid-feedback" style="display: block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group-material">
                                        <input id="email" type="text" name="email" value="{{ old('email') }}"
                                            data-msg="Please enter a valid email address"
                                            class="input-material @error('email')
                                            is-invalid
                                        @enderror">
                                        <label for="email" class="label-material">Email Address </label>
                                        @error('email')
                                            <p class="invalid-feedback" style="display: block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group-material">
                                        <input id="password" type="password" name="password"
                                            data-msg="Please enter your password"
                                            class="input-material @error('password')
                                            is-invalid
                                        @enderror">
                                        <label for="password" class="label-material">Password </label>
                                        @error('password')
                                            <p class="invalid-feedback" style="display: block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group-material">
                                        <input id="confirm_password" type="confirm_password" name="confirm_password"
                                            data-msg="Please enter your Confirm Password"
                                            class="input-material @error('confirm_password')
                                            is-invalid
                                        @enderror">
                                        <label for="confirm_password" class="label-material">Confirm Password </label>
                                        @error('confirm_password')
                                            <p class="invalid-feedback" style="display: block">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group text-center">
                                        <input id="register" type="submit" value="Register" class="btn btn-primary">
                                    </div>
                                </form><small>Already have an account? </small><a href="{{ route('account.login') }}"
                                    class="signup">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates
                    Hub</a></p>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>
</body>

</html>
