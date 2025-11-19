@extends('layouts.app')

@section('content')
    <main>
        <div class="list-credits">
            <div class="list-creditsWrap">
                <section class="bg-white mb-0">
                    <div class="container container-page">
                        <div class="row">
                            <div class="col p-0">
                                <div class="list-credits__calculator-title d-flex justify-content-between align-items-center">
                                    <h1 class="top__title pt-5 mb-0">
                                        {{$seo->title_page}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @if($credits->isNotEmpty())
                    <credit-cash-list :credits="{{$credits}}" :min_amount="{{$credits->min('min_amount')}}" :max_amount="{{$credits->max('max_amount')}}"></credit-cash-list>
                @else
                    <div class="container container-page my-4">
                        <div class="row">
                            <div class="content-text__block">
                                <div class="content-text__block-text">
                                    <h2>У этого банка пока нет предложений по потребительским кредитам.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <section class="list-credits__content">
                    <div class="list-credits__content-text">
                        <div class="container container-page">
                            <div class="content-text__block">
                                <div class="content-text__block-text">
                                    {!! $seo->content_page !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
