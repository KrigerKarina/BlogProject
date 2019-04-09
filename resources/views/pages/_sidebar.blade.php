<div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Недавние посты</h3>
                        @foreach($recentPosts as $post)
                        <div class="thumb-latest-posts">
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{route('post.show', $post->slug)}}" class="popular-img"><img src="{{$post->getImage()}}" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="{{route('post.show', $post->slug)}}" class="text-uppercase">{{$post->title}}</a>
                                    <span class="p-date">{{$post->getDate()}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Навигация по категориям</h3>
                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                                <span class="post-count pull-right"> ({{$category->posts()->count()}})</span>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>