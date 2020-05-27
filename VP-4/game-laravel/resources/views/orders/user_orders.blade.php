@extends('layouts.frontLayout.index')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Мои покупки</div>
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
                <tr class="order_cart_menu">
                    <th class="order_number">№ заказа</th>
                    <th class="order_name">Купленные Продукты</th>
                    <th class="order_total">Стоимость заказа</th>
                    <th class="order_date">Дата</th>
                </tr>
                </thead>
                <tbody class="order_table_cart-items">
                @foreach($orders as $order)
                    <tr class="order_cart-product">
                        <td class="order_number">
                            <div class="order_number-text">{{ $order->id }}</div>
                        </td>
                        <td class="order_name">
                            @foreach($order->orders as $pro)
                                <a href="{{ url('/orders/'.$order->id) }}" class="order_name-link">
                                    {{ $pro->product_name }}
                                </a><br>
                            @endforeach
                        </td>
                        <td class="order_total">
                            <p class="order_total-text">{{ $order->grand_total}}</p>
                        </td>
                        <td class="order_date">
                            <p class="order_total-text">{{ $order->created_at }}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
