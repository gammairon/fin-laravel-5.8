<article id="single-post-{{$post->id}}" class="single-post" data-id="{{$post->id}}">
    <div class="article-header">
        <div class="row">
            <div class="col">
                <div class="article-header__container">
                    <div class="article-header__container-info d-flex">
                        <div class="article-info__category">
                            @if ($post->categories)
                                @foreach ($post->categories as $category)
                                    <a href="{{ route('category',  $category) }}" title="{{$category->name}}">{{$category->name}}, </a>
                                @endforeach
                            @endif
                            <span class="ml-1"> {{$post->public_date->diffForHumans()}}</span>
                        </div>
                        <div class="article-info__views">
                            <div class="article-preview-views d-flex">
                                <div class="views-icon mr-1">
                                    <svg viewBox="0 0 17 17">
                                        <path fill="none" stroke="#a7a7a7" stroke-miterlimit="10" d="M16.4,8.5c0,0-3.5,5.4-7.9,5.4c-4.3,0-7.9-5.4-7.9-5.4 s3.5-5.4,7.9-5.4C12.9,3.1,16.4,8.5,16.4,8.5z"></path>
                                        <circle fill="none" stroke="#a7a7a7" stroke-miterlimit="10" cx="8.5" cy="8.4" r="2.5"></circle>
                                    </svg>
                                </div>

                                <span class="views-value">{{$post->views}}</span>

                            </div>
                        </div>
                    </div>
                    <h1 class="article-header__container-title">
                        {{$post->name}}
                    </h1>
                </div>
                <div class="article-header__image">
                    <img src="{{$post->getPrimaryUrl()}}" alt="{{$post->getPrimaryAlt()}}" title="{{$post->getPrimaryTitle()}}">
                </div>
            </div>
        </div>
    </div>
    <div class="article-body">
        <div class="row">
            <div class="col-12 col-md-9 article-body__left">
                <div class="">
                    <div class="article-body__left-main">
                        <div class="article-body__left-main__content">
                            <div class="article-body__left-main__content-article">
                                {!!$post->content!!}
                            </div>

                            @foreach($post->getPopularPostsByTags() as $tagPost)
                                <div class="article-body__left-main__read d-flex">
                                    <div class="read-more__left">
                                        <a href="{{route('page', $tagPost->slug)}}">
                                            <img src="{{$tagPost->getPrimary()->getUrl('thumb')}}" alt="{{$tagPost->getPrimaryAlt()}}" title="{{$tagPost->getPrimaryTitle()}}" class="read-more__left-img">
                                        </a>
                                    </div>
                                    <div class="read-more__right">
                                        <p class="read-more__right-descr">Читайте по теме</p>
                                        <a href="{{route('page', $tagPost->slug)}}" class="read-more__right-title">
                                            {{$tagPost->name}}
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="article-body__left-main__author">
                                {{__('Автор')}}: <span>{{$post->user->name}}</span>
                            </div>
                            <div class="article-body__left-main__tags">
                                @if ($post->tags)
                                    @foreach ($post->tags as $tag)
                                        @if ($loop->last)
                                            <a href="{{ route('tag.single', ['slug' => $tag->slug]) }}" title="{{$tag->name}}">{{$tag->name}}</a>
                                        @else
                                            <a href="{{ route('tag.single', ['slug' => $tag->slug]) }}" title="{{$tag->name}}">{{$tag->name}},</a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="article-body__left-main__social-container d-flex justify-content-center">
                            <a href="https://www.facebook.com/sharer.php?u={{route('page', $post->slug)}}" class="social-likes__widget widg-facebook">
                                <span></span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{route('page', $post->slug)}}" class="social-likes__widget widg-twitter">
                                <span></span>
                            </a>
                            <a href="https://t.me/share/url?url={{route('page', $post->slug)}}&text={{$post->name}}" class="social-likes__widget widg-telegram">
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 pr-0 pl-0 article-body__sidebar sidebar-wrap" >

                <div class="article-body__sidebar-panel sidebar-panel" id="sb">
                    <div class="side-bar__img">
                        <img src="{{asset('/storage/images/imgad.jpg')}}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="article-footer">
        <div class="row">
            <div class="col">
                <h2 class="read-also">Читайте также </h2>
                <div class="row mt-4">
                    @foreach($post->getPostsByCategories() as $postCategory)
                        <div class="col-12 col-md-6 col-lg-3 pr-2 pl-2 d-flex flex-md-column mb-4 w-25 article-footer__container ">
                            <div class="article-footer__article-preview">
                                <a href="{{route('page', $postCategory->slug)}}" class="article-preview__img-container">
                                    <img  src="{{$postCategory->getPrimary()->getUrl('thumb')}}" alt="{{$postCategory->getPrimaryAlt()}}" title="{{$postCategory->getPrimaryTitle()}}">
                                </a>
                            </div>
                            <div class="article-footer__article-text">
                                <div class="article-text__title">
                                    <a href="{{route('page', $postCategory->slug)}}">
                                        {{$postCategory->name}}
                                    </a>
                                </div>
                                <div class="article-text__info">
                                    <div class="article-info__views">
                                        <div class="article-preview-views d-flex align-items-center">
                                            <div class="views-icon mr-1 mb-1">
                                                <svg viewBox="0 0 17 17">
                                                    <path fill="none" stroke="#a7a7a7" stroke-miterlimit="10" d="M16.4,8.5c0,0-3.5,5.4-7.9,5.4c-4.3,0-7.9-5.4-7.9-5.4 s3.5-5.4,7.9-5.4C12.9,3.1,16.4,8.5,16.4,8.5z"></path>
                                                    <circle fill="none" stroke="#a7a7a7" stroke-miterlimit="10" cx="8.5" cy="8.4" r="2.5"></circle>
                                                </svg>
                                            </div>
                                            <span class="views-value">{{$postCategory->views}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</article>
