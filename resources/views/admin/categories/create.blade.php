@extends('admin.layout');

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Новая категория игр</h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => 'categories.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем категорию</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        @include('admin.errors')
                        <div class="form-group">
                            <label for="category-name">Название</label>
                            <input type="text" class="form-control" id="category-name" placeholder="" name="name"
                                   value="{{old('name')}}">
                            <label for="category-description">Описание</label>
                            <input type="text" class="form-control" id="category-description" placeholder="" name="description"
                                   value="{{old('description')}}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
