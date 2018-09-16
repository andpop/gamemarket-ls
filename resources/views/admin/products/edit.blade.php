@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Изменить товар</h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=>	['products.update', $product->id],
            'files'	=>	true,
            'method'	=>	'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем продукт</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product-name">Название</label>
                            <input type="text" class="form-control" id="product-name" placeholder=""
                                   value="{{$product->name}}" name="name">
                        </div>

                        <div class="form-group">
                            <label for="product-price">Цена</label>
                            <input type="text" class="form-control" id="product-price" placeholder="" name="price"
                                   value="{{$product->price}}">
                        </div>

                        <div class="form-group">
                            <img src="{{$product->getPhoto()}}" alt="" class="img-responsive" width="200">
                            <label for="product-photo">Фотография</label>
                            <input type="file" id="product-photo" name="photo">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('category_id',
                                $categories,
                              $product->getCategoryID(),
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product-description">Описание</label>
                            <textarea name="description" id="product-description" cols="30" rows="10"
                                      class="form-control" >{{$product->description}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
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
