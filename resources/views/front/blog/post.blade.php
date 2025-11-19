@extends('layouts.app')

@section('header')
   @parent
   @include('front.partials.blog.post_header')
@endsection

@section('content')
    <main>
        <section class="article-container__main">
            <div class="container zapisi">
                <div class="article-inner">
                    <a href="{{route('news')}}" class="article-backBtn"> {{__('Вернуться к списку')}} </a>
                    <div id="post-list" class="post-container">

                        @include('front.partials.blog.single_post', ['post' => $post])

                        @foreach ($posts as $nextPost)
                            @include('front.partials.blog.single_post', ['post' => $nextPost])
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@push('before_scripts')
    <script>
        let loadedPosts =  '@json($loadedPosts)';
    </script>
@endpush
