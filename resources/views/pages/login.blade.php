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
                        <div class="content-head__title-wrap__title bcg-title">Вход в систему</div>
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
                            @if(session('status'))
                                <div class="alert alert-danger">
                                    {{session('status')}}
                                </div>
                            @endif

                            @include('admin.errors')
                            <br>
                            <form class="form-horizontal contact-form" role="form" method="post" action="/login">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn send-btn">Войти в систему</button>

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