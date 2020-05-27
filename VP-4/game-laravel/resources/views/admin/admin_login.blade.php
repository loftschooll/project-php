<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/matrix-login.css') }}" />
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <div class="control-group normal_text">
        <a href="{{ asset('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo" /></a>
    </div>
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button class="close" type="button" data-dismiss="alert"></button>
            <srtong>{!! session('flash_message_error') !!}</srtong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-error alert-block">
            <button class="close" type="button" data-dismiss="alert"></button>
            <srtong>{!! session('flash_message_success') !!}</srtong>
        </div>
    @endif
    <form id="loginform" class="form-vertical" action="{{ url('admin')  }}" method="POST">
        {{ csrf_field() }}
        <div class="control-group normal_text">
            <h3>Admin Game</h3>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" name="username" id="username" placeholder="Username" required=""/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly">
                        <i class="icon-lock"></i>
                    </span>
                    <input type="password" name="password" placeholder="Password" required=""/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
            <span class="pull-right"><input type="submit" value="Login" class="btn btn-success" /> Login</span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info">Reecover</a></span>
        </div>
    </form>
</div>

<script src="{{ asset('js/backend/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend/matrix.login.js') }}"></script>
</body>

</html>
