@extends('layout')

@section('content')
    <div class="container">
        <div class="box-header with-border">
            <h3 class="text-center">Список ваших опубликованых постов</h3>
            <div class="text-center">
                <a href="{{route('posts-list.create')}}" class="btn btn-success">Добавить новый</a>
            </div>
                <div class="form-group">
                    <form method="get" action="{{route('posts-list.index')}}">
                        <label for="check">Показать черновики</label>
                        <input class=""value="1"name="check"type="checkbox">
                        @if(isset($model) && $model->check == 1) checked @endif
                        <p><input type="submit" value="Подтвердить"></p>
                    </form>
                </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6">
                        <article class="post post-grid">
                            <div class="post-thumb">
                                <a href="{{route('post.show', $post->slug)}}"><img src="{{$post->getImage()}}" class="fixed-height" alt=""></a>
                                <a href="{{route('post.show', $post->slug)}}" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">Подробнее</div>
                                </a>
                            </div>
                            <div class="post-content">
                                <header class="entry-header text-center text-uppercase">
                                    @if($post->hasCategory())
		                            <h6><a href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a></h6>
		                            @endif
                                    <h1 class="entry-title"><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h1>
                                </header>
                                <div class="entry-content">
                                    {!! $post->description !!}
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">On {{$post->getDate()}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <a href="{{route('posts-list.edit', $post->id)}}" class="btn btn-primary pull-right">Редактировать</a> 
                            </div>
                            <div class="col-md-5">
                            {{Form::open(['route'=>['posts-list.destroy', $post->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('Уверены, что хотите удалить?')" type="submit" class="delete btn btn-danger pull-left">Удалить</button>
                                {{Form::close()}}
                            </div>
                        </article>
                    </div>
                  @endforeach
            	</div>
            </div>
			@include('pages._sidebar')
  		</div>
   </div>
@endsection

<style>
    .fixed-height{
        overflow: hidden;
        display: block;
        height: 250px;
    }
</style>