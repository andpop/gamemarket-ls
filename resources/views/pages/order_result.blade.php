@extends('layout')

@section('content')
    <div class="main-content">
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры недорого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="/img/_front/slider.png" alt="Image" class="image-main"></div>
            </div>
            <div class="content-middle">
                <div class="content-head__container">
                    <div class="content-head__title-wrap">
                        <div class="content-head__title-wrap__title bcg-title">Оформление заказа</div>
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
                    <div>

                        <div class="leave-comment mr0"><!--leave comment-->
                            <h2 class="{{($data['status'] == 'OK') ? 'alert alert-success' : 'alert alert-danger'}}">
                                {{$data['message']}}</h2>
                        </div><!--end leave comment-->
                    </div>

                </div>
                <div class="content-footer__container">
                </div>
            </div>
            <div class="content-bottom"></div>
        </div>

    </div>

@endsection
