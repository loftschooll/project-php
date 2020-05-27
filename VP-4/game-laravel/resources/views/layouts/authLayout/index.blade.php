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
    <link href="{{ asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/passtrength.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
</head>
<body>
<div class="main-wrapper">
    @include('layouts.authLayout.header')
    <div class="middle">
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
            </div>
            @yield('content')
            <div class="content-bottom"></div>
        </div>
    </div>
    @include('layouts.authLayout.footer')
</div>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
