@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Посты</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('posts.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Категория</th>
                  <th>Теги</th>
                  <th>Картинка</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->getCategoryTitle()}}</td>
                  <td>{{$post->getTagsTitles()}}</td>
                  <td>
                    <img src="{{$post->getImage()}}" alt="" width="100">
                  </td>
                  <td>
                  <a href="{{route('posts.edit', $post->id)}}" class="fa fa-pencil"></a> 
                  {{Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'delete'])}}
	                  <button onclick="return confirm('Уверены, что хотите удалить?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                  </button>
	                   {{Form::close()}}
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
          </div>
    </section>
  </div>
@endsection