@extends('layout')

@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="{{route('post.show', $post->slug)}}"><img src="{{$post->getImage()}}" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            @if($post->hasCategory())
                            <h6><a href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a></h6>
                            @endif
                            <h1 class="entry-title"><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h1>
                        </header>
                        <div class="entry-content">
                            {!! $post->content !!}
                        </div>
                        <div class="decoration">
                        @foreach($post->tags as $tag)
                            <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">{{$tag->title}}</a>
                        @endforeach
                        </div>
                        <div class="social-share">
							<span class="social-share-title pull-left text-capitalize">By {{$post->author->name}} On {{$post->getDate()}}</span>
                        </div>
                    </div>
                </article>
                @if(!$post->comments->isEmpty())
                    @foreach($post->getComments() as $comment)
                        <div class="bottom-comment">
                            <div class="comment-img">
                                <img class="img-circle" src="{{$comment->author->getImage()}}" alt="" width="75" height="75">
                            </div>
                            <div class="comment-text">
                                <h5>{{$comment->author->name}}</h5>
                                <p class="comment-date">
                                    {{$comment->created_at->diffForHumans()}}
                                </p>
                                <p class="para">{{$comment->text}}</p>              
                            </div>
                                @if(($comment->user_id==Auth::user()->id) || ($post->user_id==Auth::user()->id))
                                
                                {{Form::open(['route'=>['comment.delete', $comment->id], 'method'=>'delete'])}}
                                  <button onclick="return confirm('Уверены, что хотите удалить?')" type="submit" class="delete btn btn-danger pull-right">Удалить</button>
                                {{Form::close()}}
                                
                                @endif
                                
                        </div>
                    @endforeach
                @endif

                @if(Auth::check())
                    <div class="leave-comment"><!--leave comment-->
                        <h4>Оставьте свой комментарий</h4>
                        <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                        {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="form-group">
                                <div class="col-md-12">
    								<textarea class="form-control" rows="6" name="message"
                                              placeholder="Write Massage"></textarea>
                                </div>
                            </div>
                            <button class="btn send-btn">Опубликовать</button>
                        </form>
                </div>
                @endif
            </div>
            @include('pages._sidebar')
        </div>
    </div>
</div>
<!-- end main content-->
@endsection
<style>
    .hidden {
        display: none;
    }
</style>

<!-- приклад розв'язання задачі прийняття рішень в умовах ризику

приклад реалізації алгоритму задачі комівояжера -->