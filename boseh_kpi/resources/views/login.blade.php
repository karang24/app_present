<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login KPI</title>

    <!-- Bootstrap -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/css/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('public/css/animate.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('public/css/custom.min.css') }}" rel="stylesheet">
    
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>    

    <script src="{{ asset('public/js/jquery.js') }}"></script>

    <script src=" {{ asset('public/js/jquery-ui.js') }}"></script>
        
  </head>

<body class="body-login">
    <div class="container">
        <div class="card card-container">
            <img class="profile-img-card" src="public/css/landingpage/img/logo.png"/>
            
            <form class="form-horizontal form-signin" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <div class="col-md-12">
                     <span class="title-login">Login</span>
                  </div>
                </div>   
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    {{-- <label for="username" class="col-md-4 control-label">Username</label> --}}
                    
                    <div class="col-md-12">
                        {{-- <div class="input-group">                   --}}
                            
                            <input id="username" placeholder="Username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                            {{-- <div class="input-group-addon"><i class="fa fa-camera-retro fa-lg"></i></div> --}}
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}

                    <div class="col-md-12">
                        <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                            </label>
                        </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            LOGIN
                        </button>

                        {{-- <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a> --}}

                    </div>
                </div>
                <div class="form-group">
                    <span class="pull-right"><a href="{{ url('/') }}">Back to Landing Page</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>