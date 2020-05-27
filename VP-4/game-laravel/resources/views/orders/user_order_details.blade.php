@extends('layouts.frontLayout.index')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Номер заказа {{ $orderDetails->id }}</div>
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
                    <th class="order_name">Название</th>
                    <th class="order_number">Цена товара</th>
                    <th class="order_total">Количество товара</th>
                    <th class="order_date">Стоимость заказа</th>
                </tr>
                </thead>
                <tbody class="table_cart-items">
                @foreach($orderDetails->orders as $pro)
                    <tr class="order_cart-product">
                        <td class="order_name">
                            <div class="order_number-text">{{ $pro->product_name }}</div>
                        </td>
                        <td class="order_number">
                            <div class="order_name-link">{{ $pro->product_price }}</div>
                        </td>
                        <td class="order_total">
                            <div class="order_total-text">{{ $pro->product_qty }}</div>
                        </td>
                        <td class="order_date">
                            <div class="order_total-text">{{ $pro->product_price*$pro->product_qty }}</div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
