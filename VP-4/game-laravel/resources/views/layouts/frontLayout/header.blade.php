<header class="main-header">
    <div class="logotype-container">
        <a href="{{ url('/') }}" class="logotype-link">
            <img src="{{ asset('img/logo.png') }}" alt="Логотип">
        </a>
    </div>
    <nav class="main-navigation">
        <ul class="nav-list">
            <li class="nav-list__item"><a href="{{ asset('/') }}" class="nav-list__item__link">Главная</a></li>
            <li class="nav-list__item"><a href="{{ asset('/orders') }}" class="nav-list__item__link">Мои заказы</a></li>
            <li class="nav-list__item"><a href="{{ asset('/news/news-index') }}" class="nav-list__item__link">Новости</a></li>
            <li class="nav-list__item"><a href="{{ asset('/site/company') }}" class="nav-list__item__link">О компании</a></li>
        </ul>
    </nav>
    <div class="header-contact">
        <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
    </div>
    <div class="header-container">
        <div class="payment-container">
            <div class="payment-basket__status">
                <div class="payment-basket__status__icon-block">
                    <a href="{{ url('/cart') }}" class="payment-basket__status__icon-block__link">
                        <i class="fa fa-shopping-basket"></i>
                    </a>
                </div>
                <div class="payment-basket__status__basket">
                    <a class="payment-order__status" href="{{ url('cart') }}">
                        <span class="payment-basket__status__basket-value">{{ count((array) session('cart')) }}</span>
                        <span class="payment-basket__status__basket-value-descr">товаров</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="authorization-block">
            @guest
                <li><a href="{{ url('/user-register') }}" class="authorization-block__link">Регистрация</a></li>
                <li><a href="{{ url('/user-login') }}" class="authorization-block__link">Войти</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </div>
    </div>
</header>
