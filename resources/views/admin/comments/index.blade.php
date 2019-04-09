@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Комментарии</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Текст</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                  <td>{{$comment->id}}</td>
                  <td>{{$comment->text}}
                  </td>
                  <td>
                  @if($comment->status == 1)
					<a href="/admin/comments/toggle/{{$comment->id}}" class="fa fa-lock"></a> 
                  @else
	                  <a href="/admin/comments/toggle/{{$comment->id}}" class="fa fa-thumbs-o-up"></a> 
                  @endif
                  {{Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'delete'])}}
	                  <button onclick="return confirm('are you sure?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                  </button>
	                   {{Form::close()}}
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
          </div>
    </section>
  </div>
@endsection