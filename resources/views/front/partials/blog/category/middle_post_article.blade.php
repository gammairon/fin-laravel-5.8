@if($post)
    <div class="col-12 col-md-6 pl-0">
        <div class="blog__article-preview">
            <a href="">
                <div class="blog__article-preview__img">
                    <img src="{{$post->getPrimaryUrl()}}" alt="{{$post->getPrimaryAlt()}}" title="{{$post->getPrimaryTitle()}}">
                </div>
            </a>
            <div class="blog__article-preview__text">
                <div class="blog__article-preview__text-title">
                    <a href="{{route('page', $post)}}">{{$post->name}}</a></a>
                </div>
                <div class="blog__article-preview__text-info d-none d-md-flex">
                    @foreach($post->tags as $tag)
                        <a href="#" class="text-info__tag">{{$tag->name}}</a>
                    @endforeach
                    <div class="text-info__view">
                        <div class="views-icon icon-size-17">
                            <svg viewBox="0 0 17 17">
                                <path fill="none" stroke="#a7a7a7" stroke-miterlimit="10" d="M16.4,8.5c0,0-3.5,5.4-7.9,5.4c-4.3,0-7.9-5.4-7.9-5.4 s3.5-5.4,7.9-5.4C12.9,3.1,16.4,8.5,16.4,8.5z"></path>
                                <circle fill="none" stroke="#a7a7a7" stroke-miterlimit="10" cx="8.5" cy="8.4" r="2.5"></circle>
                            </svg>
                        </div>
                        <span>{{$post->views}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
