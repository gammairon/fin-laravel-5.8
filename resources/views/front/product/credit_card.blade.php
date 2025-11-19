@extends('layouts.app')


@section('content')
    <main>
        <div class="kredit-karta">
            <div class="container container-page">
                <div class="kredit-kartaWrap">
                    <section class="kredit-karta__header">
                        <div class="row">
                            <div class="col p-0">
                                <div class="kredit-karta__header-top d-flex justify-content-between align-items-center">
                                    <h1 class="kredit-karta__header-top__title">
                                        {{$creditCard->name}}
                                    </h1>
                                    <div class="kredit-karta__header-top__logo">
                                        <img class="lazyload" data-src="{{$creditCard->bank->getPrimaryUrl()}}" alt="{{$creditCard->bank->getPrimaryAlt()}}" title="{{$creditCard->bank->getPrimaryTitle()}}">
                                    </div>
                                    <a href="{{route('bank.karty', ['bank' => $creditCard->bank])}}" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="kredit-karta__header-bottom d-flex ">
                                    <div class="kredit-karta__product-img">
                                        <img class="lazyload" data-src="{{$creditCard->getPrimaryUrl()}}" alt="{{$creditCard->getPrimaryAlt()}}" title="{{$creditCard->getPrimaryTitle()}}">
                                    </div>
                                    <div class="kredit-karta__product-info">
                                        <div class="kredit-karta__product-info__card d-flex">
                                            @if($creditCard->master_card)
                                                <div class="product-info__card-icon icon-mastercard"></div>
                                            @endif
                                            @if($creditCard->pay_wave)
                                                    <div class="product-info__card-icon icon-paypass"></div>
                                            @endif
                                            @if($creditCard->google_pay)
                                                    <div class="product-info__card-icon icon-google"></div>
                                            @endif
                                            @if($creditCard->app_store)
                                                    <div class="product-info__card-icon icon-app"></div>
                                            @endif

                                        </div>
                                        <ul class="kredit-karta__product-info__list">
                                            <li class="kredit-karta__product-info__list-item"><span class="cardInfo-list__icon icon-percent__w"></span><span class="product-info__txt">@percent($creditCard->min_percent_bid) </span> ставка по кредиту
                                            </li>
                                            <li class="kredit-karta__product-info__list-item"><span class="cardInfo-list__icon icon-calendar__w"></span><span class="product-info__txt">до {{$creditCard->grace_period}} дней </span>льготный период
                                            </li>
                                            <li class="kredit-karta__product-info__list-item">
                                                <span class="cardInfo-list__icon icon-bag__w"></span><span class="product-info__txt">до @money($creditCard->max_credit_limit) </span> кредитный лимит
                                            </li>
                                            <li class="kredit-karta__product-info__list-item"><span class="cardInfo-list__icon icon-price__w"></span><span class="product-info__txt">@money($creditCard->service_cost) в год</span> стоимость обслуживания
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="kredit-karta__content">
                        <div class="row main-content">
                            <div class="col-12 col-md-10 kredit-karta__left pl-0">
                                <div class="kredit-karta__content-item kredit-karta__conditions">
                                    <div class="kredit-karta__content-item__headline">
                                        Условия
                                    </div>
                                    <table class="table-light w-100">
                                        <tbody>
                                        <tr class="table-light__row">
                                            <th class="table-light__cell-header">Вид комиссии</th>
                                            <th class="table-light__cell-header">Стоимость</th>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Процентная ставка, %</td>
                                            <td class="table-light__cell article-content">от <span>@percent($creditCard->min_percent_bid)</span> до <span> @percent($creditCard->max_percent_bid)</span> в год</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Кредитный лимит, грн</td>
                                            <td class="table-light__cell article-content">от <span>@money($creditCard->min_credit_limit)</span> до <span> @money($creditCard->max_credit_limit)</span> в год</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Льготный период, дней</td>
                                            <td class="table-light__cell article-content"><span>{{$creditCard->grace_period}}</span> дней</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Стоимость обслуживания, грн</td>
                                            <td class="table-light__cell article-content"><span>@money($creditCard->service_cost)</span> в год</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Плата за выпуск, грн</td>
                                            <td class="table-light__cell article-content">
                                                @if($creditCard->issue_fee)
                                                    @money($creditCard->issue_fee)
                                                @else
                                                    <span>бесплатно</span>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Условия погашения задолженности</td>
                                            <td class="table-light__cell article-content"><span>{{$creditCard->repayment_terms}}</span> </td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Штрафы и пеня за просрочку</td>
                                            <td class="table-light__cell article-content">{{$creditCard->fine}}</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Страхование</td>
                                            <td class="table-light__cell article-content">{{$creditCard->insurance}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="kredit-karta__content-item kredit-karta__commissions">
                                    <div class="kredit-karta__content-item__headline">
                                        Комиссии и ставки
                                    </div>
                                    <table class="table-light w-100">
                                        <tbody>
                                        <tr class="table-light__row">
                                            <th class="table-light__cell-header">Вид комиссии</th>
                                            <th class="table-light__cell-header">Стоимость</th>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Комиссии за снятие наличных в банкомате своего банка</td>
                                            <td class="table-light__cell article-content">
                                                @foreach($creditCard->getSelfWithdrawalFees() as $selfFee)
                                                    <p>{{$selfFee}}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Комиссии за снятие наличных в банкомате стороннего банка</td>
                                            <td class="table-light__cell article-content">
                                                @foreach($creditCard->getForeignWithdrawalFees() as $foreignFee)
                                                    <p>{{$foreignFee}}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Дополнительные комиссии</td>
                                            <td class="table-light__cell article-content">
                                                @foreach($creditCard->getAdditionalFees() as $additionalFee)
                                                    <p>{{$additionalFee}}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="kredit-karta__content-item kredit-karta__commissions">
                                    <div class="kredit-karta__content-item__headline"> Преимущества
                                    </div>
                                    <table class="table-light w-100">
                                        <tbody>
                                        <tr class="table-light__row">
                                            <th class="table-light__cell-header">Вид комиссии</th>
                                            <th class="table-light__cell-header">Стоимость</th>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Кешбэк</td>
                                            <td class="table-light__cell article-content">
                                                <p>@money($creditCard->cashback_fee)</p>
                                                <p>{{$creditCard->cashback_text}}</p>
                                            </td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Дополнительные особенности</td>
                                            <td class="table-light__cell article-content">
                                                {{$creditCard->additional_features}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="kredit-karta__content-item kredit-karta__requirement">
                                    <div class="kredit-karta__content-item__headline"> Требования
                                    </div>
                                    <div class="d-block">
                                        <ul class="kredit-karta__requirements-list ">
                                            <li class="d-flex w-100 text-left">
                                                <div class="pr-4">Возраст </div>
                                                <div> от<span> {{$creditCard->min_age}} лет</span> до <span>{{$creditCard->max_age}} лет</span></div>
                                            </li>

                                            @foreach($creditCard->getDocuments() as $document)
                                                <li class="d-flex w-100 text-left">
                                                    <div>{{$document}}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="kredit-karta__content-item kredit-karta__bank-offers mb-0 pb-0">
                                    <div class="kredit-karta__content-item__headline"> Предложения от других банков
                                    </div>
                                    <div class="kredit-karta__content-item__subtitle">
                                        Кредитные карты
                                    </div>
                                </div>
                                <div class="kredit-karta__content-item__container mb-0">

                                    @foreach($additionalCards as $additionalCard)
                                        <div class="container-offer">
                                            <div class="row">
                                                <div class="col-12 col-md-4 pl-0">
                                                    <div class="karta-product__header-mob d-md-none">
                                                        <div class="karta-product__header-bank">
                                                            <a href="{{route('bank.single', $additionalCard->bank)}}">{{$additionalCard->bank->name}}</a>
                                                        </div>
                                                        <div class="karta-product__header-cardName">
                                                            <a href="{{route('bank.karta', ['bank' => $additionalCard->bank, 'creditCard' => $additionalCard])}}">{{$additionalCard->name}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="karta-pic">
                                                        <a href="{{route('bank.karta', ['bank' => $additionalCard->bank, 'creditCard' => $additionalCard])}}" >
                                                            <img class="lazyload" data-src="{{$additionalCard->getPrimaryUrl()}}" alt="{{$additionalCard->getPrimaryAlt()}}" title="{{$additionalCard->getPrimaryTitle()}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 p-0 p-md-3">
                                                    <div class="karta-product">
                                                        <div class="karta-product__header">
                                                            <div class="karta-product__header-bank">
                                                                <a href="{{route('bank.single', $additionalCard->bank)}}">{{$additionalCard->bank->name}}</a>
                                                            </div>
                                                            <div class="karta-product__header-cardName">
                                                                <a href="{{route('bank.karta', ['bank' => $additionalCard->bank, 'creditCard' => $additionalCard])}}">{{$additionalCard->name}}</a>
                                                            </div>
                                                        </div>
                                                        <ul class="karta-product__cardInfo">
                                                            <li class="karta-product__cardInfo-item"><span class="cardInfo-list__icon icon-percent"></span><span>@percent($additionalCard->min_percent_bid) </span>процентная ставка
                                                            </li>
                                                            <li class="karta-product__cardInfo-item"><span class="cardInfo-list__icon icon-bag"></span><span>до @money($additionalCard->max_credit_limit) </span>кредитный лимит
                                                            </li>
                                                            <li class="karta-product__cardInfo-item">
                                                                <span class="cardInfo-list__icon icon-calendar"></span><span>{{$additionalCard->grace_period}} дней </span> льготный период
                                                            </li>
                                                            <li class="karta-product__cardInfo-item"><span class="cardInfo-list__icon icon-price"></span><span>@money($creditCard->service_cost)</span> стоимость обслуживания
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-2 d-none d-md-block">
                                                    <div class="over-btn">
                                                        <a href="{{route('bank.karta', ['bank' => $additionalCard->bank, 'creditCard' => $additionalCard])}}">Перейти</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

                            <div class="col-2 pr-0 pl-0 kredit-karta__sidebar sidebar" id="sidebar">
                                <div class="article-body__sidebar-panel sidebar__inner" id="kredit-karta__sb">
                                    <div class="side-bar__img">
                                        <img src="https://finfin.com.ua/storage/images/imgad.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
