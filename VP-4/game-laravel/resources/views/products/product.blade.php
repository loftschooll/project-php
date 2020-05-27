@extends('layouts.frontLayout.index')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">{{ $productDetails->name }}</div>
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
        <div class="content-main__container">
            <div class="product-container">
                <form id="addtocartForm" name="addtocartForm" action="{{ url('add-cart') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $productDetails->id }}" />
                    <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}" />
                    <input type="hidden" name="price" value="{{ $productDetails->price }}" />
                    <div class="product-container__image-wrap">
                        <img src="{{ asset('img/products/standard/' . $productDetails->image) }}" class="image-wrap__image-product">
                    </div>
                    <div class="product-container__content-text">
                        <div class="product-container__content-text__title">{{ $productDetails->product_name }}</div>
                        <div class="product-container__content-text__price">
                            <div class="product-container__content-text__price__value">
                                Цена: <b>{{ $productDetails->price }}</b> руб
                            </div>
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" />
                            </div>
                            <button type="submit" class="button_cart" id="cartButton">Купить</button>
                        </div>
                        <div class="product_details-button">
                            <a href="#popup" class="application_button">Заявка</a>
                        </div>
                        <div class="product-container__content-text__description">
                            <p>{{ $productDetails->description }}</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="content-bottom">
        @include('layouts.frontLayout.over-footer')
    </div>
    <div class="content-bottom">
        <div id="popup" class="white-popup mfp-with-anim mfp-hide">
            <div class="card_form_popup">
                <h2 class="card_title_popup_h2">Оставить заявку на покупку товара</h2>
                <form class="popup_forms" action="{{ url('/email/email-orders/'.$productDetails->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}" />
                    <input type="hidden" name="price" value="{{ $productDetails->price }}" />
                    <div class="comments_form_popup">
                        <div class="product-container__image-wrap">
                            <img src="{{ asset('img/products/standard/' . $productDetails->image) }}" class="image-wrap__image-product">
                        </div>
                        <div class="product-container__content-text__title">{{ $productDetails->product_name }}</div>
                        <label class="comments_form_popup">
                            <input class="comments_form-input_popup" name="name" type="text" value="{{ $userDetails->name }}" />
                        </label>
                        <label class="comments_form_popup">
                            <input class="comments_form-input_popup" name="email" type="text" value="{{ $userDetails->email }}"/>
                        </label>
                        <button class="comments_send_label_popup" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
