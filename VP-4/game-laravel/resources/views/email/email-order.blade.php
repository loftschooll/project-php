@extends('layouts.frontLayout.index')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Заявка</div>
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
        <div class="message_thanks-block">
            <div class="message_thanks">
                <h3 class="message_thanks-title">СПАСИБО!!! ВАША ЗАЯВКА ПРИНЯТА!!!</h3><br>
                <h3 class="message_thanks-title">ЖДЕМ ВАС ЕЩЁ!!!</h3>
            </div>
        </div>
    </div>
@endsection
