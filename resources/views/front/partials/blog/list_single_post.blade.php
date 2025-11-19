 @if ($posts->isNotEmpty())
     @foreach ($posts as $post)
        @include('front.partials.blog.single_post', ['post' => $post])
     @endforeach
 @endif