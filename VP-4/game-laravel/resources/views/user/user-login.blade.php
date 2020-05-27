@extends('layouts.authLayout.index')

@section('content')
    <section id="form" style="margin-top: 0px;"><!--form-->
        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button class="close" type="button" data-dismiss="alert">x</button>
                <srtong>{!! session('flash_message_error') !!}</srtong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button class="close" type="button" data-dismiss="alert">x</button>
                <srtong>{!! session('flash_message_success') !!}</srtong>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Войти в Ваш аккаунт</h2>
                        <form action="{{ url('/login-user') }}" method="POST">
                            {{ csrf_field() }}
                            <input id="email" name="email" type="email" placeholder="Email Address"/>
                            <input name="password" type="password" placeholder="Password"/>
                            <button type="submit" class="btn btn-default">Войти</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
