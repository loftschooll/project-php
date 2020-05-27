@extends('layouts.frontLayout.index')

@section('content')
    <div class="content-middle">
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
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
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Корзина покупок</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form">
                        <input type="text" class="search-container__form__input">
                        <button class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="cart-product-list">
            <table class="table_cart">
                <thead class="table_cart-title">
                <tr class="cart_menu">
                    <th class="cart_image">Фото</th>
                    <th class="cart_name">Название</th>
                    <th class="cart_price">Цена</th>
                    <th class="cart_quantity">Кол-во</th>
                    <th class="total-result">Всего</th>
                    <th class="cart_delete-title"></th>
                </tr>
                </thead>
                <tbody class="table_cart-items">
                <?php $total_amount = 0; ?>
                @foreach($userCart as $cart)
                    <tr class="cart-product">
                        <td class="cart_image-photo">
                            <img src="{{ asset('img/products/small/'.$cart->image) }}" class="cart_image-photo_item" />
                        </td>
                        <td class="cart_name">
                            <div class="cart_name-text"><a href="#">{{ $cart->product_name }}</a></div>
                        </td>
                        <td class="cart_price">
                            <span class="cart_price-text">{{ $cart->price }} рублей</span>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a href="{{ url('/cart/update-quantity/'.$cart->id).'/1' }}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off"/>
                                <a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id).'/-1' }}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ $cart->price*$cart->quantity }}</p>
                        </td>
                        <td class="cart_delete-title">
                            <div class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ url('/cart/delete-product/'.$cart->id) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <p class="total_amount-result" type="hidden">{{ $total_amount = $total_amount + ( $cart->price*$cart->quantity ) }}</p>
                @endforeach
                </tbody>
            </table>
            <div class="cart-product-list__result-item">
                <div class="cart-product-list__result-item__text">Итого</div>
                <div class="cart-product-list__result-item__value"><?php echo $total_amount; ?> рублей</div>
            </div>
        </div>
        <div class="content-footer__container">
            <div class="btn-buy-wrap">
                <a href="{{ url('/checkout') }}" class="btn-buy-wrap__btn-link">Перейти к оплате</a>
            </div>
        </div>
    </div>
    <div class="content-bottom">
        @include('layouts.frontLayout.over-footer')
    </div>
@endsection
