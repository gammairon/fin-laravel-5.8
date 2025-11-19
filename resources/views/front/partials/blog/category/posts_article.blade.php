@if($posts->isNotEmpty())
    <div class="blog__article">
        @include('front.partials.blog.category.full_post_article', ['post' => $posts->shift()])
        @if($posts->isNotEmpty())
            <div class="row blog__article-container">
                @for ($i = 0; $i < 2; $i++)
                    @include('front.partials.blog.category.middle_post_article', ['post' => $posts->shift()])
                @endfor
            </div>
        @endif
        @if($posts->isNotEmpty())
            <div class="row blog__article-container">
                @for ($i = 0; $i < 2; $i++)
                    @include('front.partials.blog.category.middle_post_article', ['post' => $posts->shift()])
                @endfor
            </div>
        @endif
    </div>
@endif
