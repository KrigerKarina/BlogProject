@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                 <div class="content-wrapper">
                    <section class="content">
                        {{Form::open([
                            'route' => 'posts-list.store',
                            'files' =>  true
                        ])}}
                          <div class="box">
                            <div class="box-header with-border">
                              <h3 class="box-title">Заполните данные о посте</h3>
                              @include('admin.errors')
                            </div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Название</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputFile">Лицевая картинка</label>
                                      <input type="file" id="exampleInputFile" name="image">
                                    </div>
                                    <div class="form-group">
                                      <label>Категория</label>
                                      {{Form::select('category_id', 
                                        $categories, 
                                        null, 
                                        ['class' => 'form-control select2'])
                                      }}
                                    </div>
                                    <div class="form-group">
                                      <label>Теги</label>
                                      {{Form::select('tags[]', 
                                        $tags, 
                                        null, 
                                        ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])
                                      }}
                                    </div>
                                    <div class="form-group">
                                      <label>Дата:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
                                      </div>
                                    </div>
                           <!--          <div class="form-group">
                                      <label>
                                        <input type="checkbox" class="minimal" name="is_featured">
                                      </label>
                                      <label>
                                        Рекомендовать
                                      </label>
                                    </div> -->
                                    <div class="form-group">
                                      <label>
                                        <input type="checkbox" class="minimal" name="status">
                                      </label>
                                      <label>
                                        Опубликовать
                                      </label>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Описание</label>
                                      <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
                                     </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Полный текст</label>
                                      <textarea name="content" id="" cols="30" rows="10" class="form-control" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-default" href="{{route('posts-list.index')}}">Назад</a>
                                <button class="btn btn-success pull-right">Добавить</button>
                            </div>
                        </div>
                        {{Form::close()}}
                    </section>
                </div>
            </div>
            @include('pages._sidebar')
        </div>
    </div>
@endsection