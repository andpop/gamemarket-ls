@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Новая игра</h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=> 'products.store',
            'files'	=>	true
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем товар</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product-name">Название</label>
                            <input type="text" class="form-control" id="product-name" placeholder="" name="name"
                                   value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="product-price">Цена</label>
                            <input type="text" class="form-control" id="product-price" placeholder="" name="price"
                                   value="{{old('price')}}">
                        </div>

                        <div class="form-group">
                            <label for="product-photo">Фото товара</label>
                            <input type="file" id="product-photo" name="photo">

                            <p class="help-block">Какое-нибудь уведомление о форматах.</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('category_id',
                                $categories,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product-description">Описание</label>
                            <textarea name="description" id="product-description" cols="25" rows="10" class="form-control" >
                                {{old('description')}}
                            </textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection