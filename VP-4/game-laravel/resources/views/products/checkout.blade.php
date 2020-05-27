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
                <div class="content-head__title-wrap__title bcg-title">Проверка Заказа</div>
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
        <div class="checkout_block-items">
            <h3 class="checkout_block-info">Информация о Покупателе</h3>
            <div class="checkout_block">
                <h4 class="checkout_block-name" >Имя: <span>{{ $userDetails->name }}</span></h4>
                <h4 class="checkout_block-name">Email: <span>{{ $userDetails->email }}</span></h4>
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
                            <span class="cart_price-text">{{ $cart->price}} рублей</span>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <div class="cart_quantity_input">
                                    {{ $cart->quantity }}
                                </div>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ $cart->price*$cart->quantity }}</p>
                        </td>
                    </tr>
                    <p class="total_amount-result" type="hidden">{{ $total_amount = $total_amount + ( $cart->price*$cart->quantity ) }}</p>
                @endforeach
                </tbody>
            </table>
            <div class="cart-product-list__result-item">
                <p class="total_amount-result" type="hidden">{{ $total_amount }}</p>
                <p class="total_amount-result" type="hidden">{{ $grand_total = $total_amount }}</p>
                <div class="cart-product-list__result-item__text">Итого</div>
                <div class="cart-product-list__result-item__value"><?php echo $grand_total; ?> рублей</div>

            </div>
        </div>
        <form name="paymentForm" id="paymentForm" action="{{ url('/place-order') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $userDetails->name }}" />
            <input type="hidden" name="grand_total" value="{{ $grand_total }}" />
            <div class="content-footer__container">
                <div class="btn-buy-wrap">
                    <button type="submit" class="btn-buy-wrap__btn-link">Перейти к оплате</button>
                </div>
            </div>
        </form>
    </div>
@endsection
