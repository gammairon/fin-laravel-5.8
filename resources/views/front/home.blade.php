@extends('layouts.app')

@section('content')
    <main>
        <section class="slider-main">
            <div class="home-slider-wrap">
                <slick-slider></slick-slider>
            </div>
        </section>
        <section class="credit-types">
            <div class="container container-page">
                <div class="wrap-page">
                    <div class="row">
                        <div class="col-12 col-lg-4 mx-auto my-auto credit-types__item">
                            <a href="{{route('credity')}}">
                                {{__('Кредиты')}}
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 mx-auto my-auto credit-types__item">
                            <a href="{{route('karty')}}">
                                {{__('Кредитные карты')}}
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 mx-auto my-auto credit-types__item">
                            <a href="{{route('mfo.all')}}">
                                {{__('Микрозаймы')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="currency">
            <div class="container container-page">
                <div class="wrap-page">
                    <div class="row">
                        <div class="col d-flex justify-content-between w-100 pr-0 pl-0 currencyWrap">
                            <div class="currency-items d-flex">
                                @foreach($currencyRates as $currencyRate)
                                    <div class="currency-item d-flex">
                                        <a href="#">{{$currencyRate->cc}} </a>
                                        @if($currencyRate->new_rate >= $currencyRate->old_rate)
                                            <span class="up">@toNumber($currencyRate->new_rate)</span>
                                        @else
                                            <span class="down">@toNumber($currencyRate->new_rate)</span>
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                            <a href="#" class="all-courses">{{__('Все курсы валют в банках')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="best-deals">
            <div class="container container-page">
                <div class="wrap-page parent">
                    <div class="row">
                        <div class="col pr-0 pl-0">
                            <h2 class="title"> {{__('Лучшие предложения')}}</h2>
                            <div class="row">
                                <div class="col d-flex justify-content-between best-deals__containerWrap pr-0 pl-0 w-100">
                                    <div class="best-deals__container d-flex">
                                        <div class="best-deals__container-item active">
                                            <span class="tab" data-target="#credit_card">{{__('Кредитные карты')}} </span>
                                        </div>
                                        <div class="best-deals__container-item">
                                            <span class="tab" data-target="#credit_cash">{{__('Потребительский кредит')}} </span>
                                        </div>
                                        <div class="best-deals__container-item">
                                            <span class="tab" data-target="#mfo_credit"> {{__('Микрозайм')}}</span>
                                        </div>
                                    </div>
                                    <a href="#" class="best-deals__all">{{__('Все предложения')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="credit_card" class="row best-deals__creditWrap kart-kredit w-100 tab_content active">
                        <div class="best-deals__credit   justify-content-between">
                            @foreach($cardCredits as $cardCredit)
                                <div class="col-4 best-deals__credit-itemWrap p-0">
                                    <div class="best-deals__credit-item">
                                        <div class=" top-block d-flex justify-content-between">
                                            <div class=" top-block__main d-flex flex-column">
                                                <div class="top-block__main-title">
                                                    {{$cardCredit->bank->name}}
                                                </div>
                                                <div class="top-block__main-special">
                                                    {{$cardCredit->special_offer}}
                                                </div>
                                            </div>
                                            <div class="top-block__img">
                                                <img class="lazyload" data-src="{{$cardCredit->getPrimary()->getUrl('thumb')}}" alt="{{$cardCredit->getPrimaryAlt()}}" title="{{$cardCredit->getPrimaryTitle()}}">
                                            </div>
                                        </div>
                                        <div class="down-block d-flex flex-column">
                                            <div class="down-block__desc d-flex justify-content-between">
                                                <div class="down-block__desc-servise d-flex flex-column">
                                                    <div class="d-flex">@money($cardCredit->service_cost)</div>
                                                    <p>Обслуживание</p>
                                                </div>
                                                <div class="down-block__desc-maxCredit d-flex flex-column">
                                                    <div class="d-flex">до @money($cardCredit->max_credit_limit)</div>
                                                    <p>кредитный лимит</p>
                                                </div>
                                            </div>
                                            <a href="{{route('bank.karta', $cardCredit->getRouteKeys())}}" class="more-info">{{__('Подробнее')}}</a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="credit_cash" class="row best-deals__creditWrap cons-kredit w-100 tab_content">
                        <div class="best-deals__credit   justify-content-between">
                            @foreach($cashCredits as $cashCredit)
                                <div class="col-4 best-deals__credit-itemWrap p-0">
                                    <div class="best-deals__credit-item">
                                        <div class=" top-block d-flex justify-content-between">
                                            <div class=" top-block__main d-flex flex-column">
                                                <div class="top-block__main-title">
                                                    {{$cashCredit->bank->name}}
                                                </div>
                                                <div class="top-block__main-special">
                                                    {{$cashCredit->special_offer }}
                                                </div>
                                            </div>
                                            <div class="top-block__img">
                                                <img class="lazyload" data-src="{{$cashCredit->bank->getPrimary()->getUrl('thumb')}}" alt="{{$cardCredit->bank->getPrimaryAlt()}}" title="{{$cardCredit->bank->getPrimaryTitle()}}">
                                            </div>
                                        </div>
                                        <div class="down-block d-flex flex-column">
                                            <div class="down-block__desc d-flex justify-content-between">
                                                <div class="down-block__desc-servise d-flex flex-column">
                                                    <div class="d-flex">от @percent( $cashCredit->bids->min('percent') ) </div>
                                                    <p>Обслуживание</p>
                                                </div>
                                                <div class="down-block__desc-maxCredit d-flex flex-column">
                                                    <div class="d-flex">до @money($cashCredit->max_amount)</div>
                                                    <p>кредитный лимит</p>
                                                </div>
                                            </div>
                                            <a href="{{route('bank.credit', $cashCredit->getRouteKeys())}}" class="more-info">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="mfo_credit" class="row best-deals__creditWrap microzaim w-100 tab_content">
                        <div class="best-deals__credit  justify-content-between">
                            @foreach($mfos as $mfo)
                                <div class="col-4 best-deals__credit-itemWrap p-0">
                                    <div class="best-deals__credit-item">
                                        <div class=" top-block d-flex justify-content-between">
                                            <div class=" top-block__main d-flex flex-column">
                                                <div class="top-block__main-title">
                                                    {{$mfo->name}}
                                                </div>
                                                <div class="top-block__main-special">
                                                    {{$mfo->special_offer}}
                                                </div>
                                            </div>
                                            <div class="top-block__img">
                                                <img class="lazyload" data-src="{{$mfo->getPrimary()->getUrl('thumb')}}" alt="{{$cardCredit->getPrimaryAlt()}}" title="{{$cardCredit->getPrimaryTitle()}}">
                                            </div>
                                        </div>
                                        <div class="down-block d-flex flex-column">
                                            <div class="down-block__desc d-flex justify-content-between">
                                                <div class="down-block__desc-servise d-flex flex-column">
                                                    <div class="d-flex">@percent($mfo->free_credit_bid)</div>
                                                    <p> в день</p>
                                                </div>
                                                <div class="down-block__desc-maxCredit d-flex flex-column">
                                                    <div class="d-flex">до @money($mfo->free_credit_amount)</div>
                                                    <p>кредитный лимит</p>
                                                </div>
                                            </div>
                                            <a href="{{route('mfo.single', $mfo)}}" class="more-info">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="useful-articles">
            <div class="container container-page">
                <div class="wrap-page parent">
                    <div class="row">
                        <div class="col pr-0 pl-0">
                            <h2 class="title">Полезные статьи</h2>
                            <div class="row">
                                <div class="col d-flex justify-content-between pr-0 pl-0">
                                    <div class="useful-articles__container d-flex">
                                        <div class="useful-articles__container-item active">
                                            <span class="tab" data-target="#advice">Советы </span>
                                        </div>
                                        <div class="useful-articles__container-item">
                                            <span class="tab" data-target="#qa">Вопрос - ответ </span>
                                        </div>
                                    </div>
                                    <a href="{{route('news')}}" class="useful-articles__all">Все статьи</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="advice" class="row mt-4 w-100 justify-content-between useful-art advice tab_content active">
                        @foreach($advices as $advice)
                            @if($loop->iteration == 4)
                                <div class="col-lg-3 pr-0 pl-0 d-none d-lg-flex flex-md-column useful-articles__block ">
                                    <a href="{{route('page', $advice->slug)}}" class="useful-articles__block-img">
                                        <img class="lazyload" src="{{$advice->getPrimary()->getUrl('thumb')}}" alt="{{$advice->getPrimaryAlt()}}" title="{{$advice->getPrimaryTitle()}}">
                                    </a>
                                    <a href="{{route('page', $advice->slug)}}" class="useful-articles__block-desc">
                                        {{$advice->name}}
                                    </a>
                                </div>
                            @else
                                <div class="col-12 col-md-4 col-lg-3 pr-0 pl-0 d-flex flex-md-column useful-articles__block ">
                                    <a href="{{route('page', $advice->slug)}}" class="useful-articles__block-img">
                                        <img class="lazyload" src="{{$advice->getPrimary()->getUrl('thumb')}}" alt="{{$advice->getPrimaryAlt()}}" title="{{$advice->getPrimaryTitle()}}">
                                    </a>
                                    <a href="{{route('page', $advice->slug)}}" class="useful-articles__block-desc">
                                        {{$advice->name}}
                                    </a>
                                </div>
                            @endif

                        @endforeach

                    </div>
                    <div id="qa" class="row mt-4 w-100 justify-content-between useful-art qa tab_content">
                        @foreach($questionAnswers as $questionAnswer)
                            @if($loop->iteration == 4)
                                <div class="col-lg-3 pr-0 pl-0 d-none d-lg-flex flex-md-column useful-articles__block ">
                                    <a href="{{route('page', $questionAnswer->slug)}}" class="useful-articles__block-img">
                                        <img class="lazyload" src="{{$questionAnswer->getPrimary()->getUrl('thumb')}}" alt="{{$questionAnswer->getPrimaryAlt()}}" title="{{$questionAnswer->getPrimaryTitle()}}">
                                    </a>
                                    <a href="{{route('page', $questionAnswer->slug)}}" class="useful-articles__block-desc">
                                        {{$questionAnswer->name}}
                                    </a>
                                </div>
                            @else
                                <div class="col-12 col-md-4 col-lg-3 pr-0 pl-0 d-flex flex-md-column useful-articles__block ">
                                    <a href="{{route('page', $questionAnswer->slug)}}" class="useful-articles__block-img">
                                        <img class="lazyload" src="{{$questionAnswer->getPrimary()->getUrl('thumb')}}" alt="{{$questionAnswer->getPrimaryAlt()}}" title="{{$questionAnswer->getPrimaryTitle()}}">
                                    </a>
                                    <a href="{{route('page', $questionAnswer->slug)}}" class="useful-articles__block-desc">
                                        {{$questionAnswer->name}}
                                    </a>
                                </div>
                            @endif

                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between pr-0 pl-0 mt-4">
                            <a href="{{route('news')}}" class="all-article">Все статьи</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="why-finfin">
            <div class="container container-page">
                <div class="wrap-page">
                    <div class="row">
                        <div class="col pl-0 pr-0">
                            <h2 class="title"> Почему выбирают FinFin</h2>
                            <div class="row why-finfin__containerWrap w-100">
                                <div class="why-finfin__container d-flex justify-content-between">
                                    <div class="col-4 why-finfin__container-item" >
                                        <div class="relevant">
                                            <h3> Актуально </h3>
                                            <p> Мы ежедневно собираем и обновляем предложения 450 банков и 200 страховых компаний</p>
                                        </div>
                                    </div>
                                    <div class="col-4 why-finfin__container-item">
                                        <div class="sparingly">
                                            <h3> Экономно </h3>
                                            <p> Вы сможете найти выгодные предложения, что сэкономит не только ваши деньги, но и время</p>
                                        </div>
                                    </div>
                                    <div class="col-4 why-finfin__container-item">
                                        <div class="reliably">
                                            <h3> Надежно </h3>
                                            <p> Все данные, которые вы оставляете на сайте, надежно защищены протоколом SSL</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
