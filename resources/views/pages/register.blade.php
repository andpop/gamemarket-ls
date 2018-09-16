@extends('layout')

@section('content')
    <div>

        <div class="leave-comment mr0"><!--leave comment-->

            <h3 class="text-uppercase">Регистрация в системе</h3>
            @include('admin.errors')
            <br>
            <form class="form-horizontal contact-form" role="form" method="post" action="/register">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" value="{{old('email')}}" class="form-control" id="email" name="email"
                               placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="password">
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="is_admin" name="is_admin"
                           value="1"/>
                    <label for="is_admin">Администратор</label>

                </div>

                <button type="submit" class="btn send-btn">Зарегистрироваться</button>

            </form>
        </div><!--end leave comment-->
    </div>

@endsection