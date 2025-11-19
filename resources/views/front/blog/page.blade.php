@extends('layouts.app')


@section('content')
    <main>
        <section class="container  article-container__main">
            <div class="page px-4">

                <div class="py-5">
                    <h1 class="mb-4">{{$page->name}}</h1>

                    <div class="page-content">
                        {!!$page->content!!}
                    </div>

                    @if($page->faqs->isNotEmpty())
                        <div class="cards__content-questions">
                        <div class="container container-page">
                            <div class="accordion fifin_accordion" id="accordionExample">
                                <h3>FAQ</h3>
                                @foreach($page->faqs as $faq)
                                    <accordion-item :item="{
                                        question: '{{$faq->question}}',
                                        answer: '{{$faq->answer}}',
                                        isShow: false,
                                    }"></accordion-item>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

@endsection
