@extends('admin.layout')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Добавить пользователя
      </h1>
    </section>
    <section class="content">
		{{Form::open(['route'	=>	'users.store', 'files'	=>	true])}}
      <div class="box">
        <div class="box-header with-border">
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('name')}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('email')}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Аватар</label>
              <input type="file" name="avatar" id="exampleInputFile">
            </div>
        </div>
      </div>
        <div class="box-footer">
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
      </div>
	{{Form::close()}}
    </section>
  </div>
@endsection