<div class="col col-md-6 col-lg-3 pr-2 pl-2 d-flex flex-md-column mb-4 w-25 article-footer__container  ">
    <div class="article-footer__article-preview">
        <a href="{{route('page', $post)}}" class="article-preview__img-container">
            <img src="{{$post->getPrimaryUrl()}}" alt="{{$post->getPrimaryAlt()}}" title="{{$post->getPrimaryTitle()}}">
        </a>
    </div>
    <div class="article-footer__article-text">
        <div class="article-text__title">
            <a href="{{route('page', $post)}}">
                {{$post->name}}
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
                    <span class="views-value">{{$post->views}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
