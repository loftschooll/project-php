<!DOCTYPE html>
<html lang="ru">
<head>
    <title>main - ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-css.css') }}"/>
    <link href="{{ asset('css/frontend/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/passtrength.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
</head>
<body>
<div class="main-wrapper">
    @include('layouts.frontLayout.header')
    <div class="middle">
        @include('layouts.frontLayout.sidebar')
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
            </div>
            @yield('content')
            <div class="content-bottom"></div>
        </div>
    </div>
    @include('layouts.frontLayout.footer')
</div>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/frontend/price-range.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('js/frontend/main.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/frontend/passtrength.js') }}" type="text/javascript"></script>
<script src="{{asset('js/frontend/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/frontend/common.js')}}"></script>
</body>
</html>
