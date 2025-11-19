@extends('layouts.app')


@section('content')
    <main>
        <div class="kategory-blog">
            <div class="blogWrap">
                <div class="container container-page">
                    <section class="blog-cont">
                        <div class="row main-content">
                            <div class="col-12 col-md-10 blog pl-0">
                                <div class="blog-main">
                                    <div class="blog-main__header d-flex">
                                        <ul class="d-flex mb-0 p-0">
                                            <li>
                                                <a href="{{route('news')}}" class="{{ !isset($currentCategory) ? 'title_onClick' : '' }}">Все статьи </a>
                                            </li>
                                            @foreach($categories as $category)
                                                <li><a href="{{route('category' , $category)}}" class="{{ ( isset($currentCategory) && $currentCategory->id == $category->id) ? 'title_onClick' : '' }}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="blog-main__content ">
                                        @include('front.partials.blog.category.posts_article', compact('posts'))
                                    </div>
                                </div>
                                @if ($posts->hasMorePages())
                                    <div class="anchor-block">
                                        <div class="showMore"> Читать еще </div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-2 pr-0 pl-0 mfo-sidebar sidebar" id="sidebar">
                                <div class="article-body__sidebar-panel sidebar__inner" id="blog__sb">
                                    <div class="side-bar__img">
                                        <img src="/storage/images/imgad.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="article-footer">
                        <div class="row">
                            <div class="col pr-0 pl-0">
                                <h2 class="read-also">Читайте также </h2>
                                <div class="row mt-4">
                                    @foreach($readAlsoPosts as $post)
                                        @include('front.partials.blog.category.read_also_post_article', compact('post'))
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('before_scripts')
    <script>
        let nextPageUrl =  '{{$posts->nextPageUrl()}}';
    </script>
@endpush
