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

                            <h3 class="text-uppercase">{{$product->name}}</h3>
                            @include('admin.errors')
                            <br>
                            <form class="form-horizontal buy-form" role="form" method="post" action="/buy">
                                {{csrf_field()}}
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="user_name">Ваше полное имя</label>
                                        <input type="text" class="form-control" id="user_name" name="user_full_name"
                                               placeholder="Name" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="email">Ваше email</label>
                                        <input type="text" value="{{Auth::user()->email}}" class="form-control" id="email" name="email"
                                               placeholder="Email">
                                    </div>
                                </div>

                                <button type="submit" class="btn send-btn">Оформить заказ</button>

                            </form>
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