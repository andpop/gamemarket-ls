@extends('layout')

@section('content')
    <div>

        <div class="leave-comment mr0"><!--leave comment-->
            @if(session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
            @endif

            <h3 class="text-uppercase">Вход в систему</h3>
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

@endsection