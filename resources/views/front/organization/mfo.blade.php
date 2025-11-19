@extends('layouts.app')



@section('content')
    <main>
        <div class="mfo">
            <div class="mfoWrap">
                <section class="mfo-header">
                    <div class="container container-page">
                        <div class="mfo-header__top">
                            <div class="row">
                                <div class="col-12 back pr-0 pl-0 d-none d-md-block">
                                    <a href="{{route('mfo.all')}}">
                                        Вернуться к cписку
                                    </a>
                                </div>
                                <div class="col-12 back-mob pr-0 pl-0 d-md-none d-block">
                                    <a href="{{route('mfo.all')}}">
                                        <svg class="back-mob__btn"><use xlink:href="#arrow">
                                                <svg viewBox="0 0 16.7 15.7" id="arrow" xmlns="http://www.w3.org/2000/svg"><path d="M16.7 7.3H1.9L8.1.7 7.3 0 0 7.9l7.3 7.8.8-.7-6.3-6.7h14.9"></path></svg>
                                            </use></svg>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-8 mfo-header__top-title pr-md-4 pr-0 pl-0">
                                    <a href="#" class="logo-img mob d-block d-md-none">
                                        <img class="adaptive lazyload" data-src="{{$mfo->getPrimaryUrl()}}" alt="{{$mfo->getPrimaryAlt()}}" title="{{$mfo->getPrimaryTitle()}}">
                                    </a>
                                    <h1 class="top__title"> {{ $mfo->name }} </h1>
                                    <h2 class="top__sub-title"> {{ $mfo->subtitle }} </h2>
                                </div>
                                <div class="col-12 col-md-4 d-none d-md-flex justify-content-end mfo-header__top-logo pr-0 pl-0">
                                    <a href="" class="logo-img">
                                        <img class="adaptive lazyload" data-src="{{$mfo->getPrimaryUrl()}}" alt="{{$mfo->getPrimaryAlt()}}" title="{{$mfo->getPrimaryTitle()}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mfo-header__bottom">
                            <div class="mfo__line"></div>
                            <div class="brief-conditions__container">
                                <div class="brief-conditions__container-item">
                                    <div class="row pr-0 pl-0">
                                        <div class="col-12 col-md-6 p-0">
                                            <p>Первый займ:<b> <span> @percent($mfo->free_credit_bid ?? $mfo->repeat_credit_bid)</span> в день, до @money($mfo->first_credit)</b></p>
                                        </div>
                                        <div class="col-12 col-md-6 p-0">
                                            <p>Повторный займ: <b><span> @percent($mfo->repeat_credit_bid)</span> в день, до @money($mfo->first_credit) </b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mfo-header__btn">
                            <div class="row">
                                <div class="col pt-0 pl-0 d-flex justify-content-center justify-content-md-start">
                                    <div class="send-request d-none d-md-block">
                                        <a href="javascript:void(0);" rel="nofollow" data-href="{{$mfo->ref_link}}" class="redirect">Отправить заявку</a>
                                    </div>
                                    <div class="personal-account">
                                        <a href="javascript:void(0);" rel="nofollow" data-href="{{$mfo->ref_link}}" class="redirect">Личный кабинет</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="container container-page">
                    <section class="mfo-content">
                        <div class="row main-content">
                            <div class="col-12 col-md-10 mfo__left pl-0">
                                <div class="mfo-content__item mfo-conditions">
                                    <div class="mfo-content__item-headline">
                                        Условия получения кредита <span>{{$mfo->name}}</span>
                                    </div>
                                    <table class="table-light w-100">
                                        <tbody>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Сумма</td>
                                            <td class="table-light__cell article-content">от @money($mfo->min_amount) до @money($mfo->max_amount) (первый займ - до  @money($mfo->first_credit))</td>
                                        </tr>
                                        @if($mfo->free_credit_bid)
                                            <tr class="table-light__row">
                                                <td class="table-light__cell">Бесплатный кредит</td>
                                                <td class="table-light__cell article-content"> @money($mfo->free_credit_amount) под @percent($mfo->free_credit_bid)</td>
                                            </tr>
                                        @endif

                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Срок</td>
                                            <td class="table-light__cell article-content">от <span>{{$mfo->min_term}}</span> до <span>{{$mfo->max_term}}</span> дней</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Возраст</td>
                                            <td class="table-light__cell article-content">от <span>{{$mfo->min_age}}</span> до <span>{{$mfo->max_age}}</span> лет</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Время рассмотрения </td>
                                            <td class="table-light__cell article-content"><span>{{$mfo->time_review}}</span> минут</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Способ получения</td>

                                                <td class="table-light__cell article-content">
                                                    @if($mfo->receiving_method_card)
                                                        <span>на карту</span><br/>
                                                    @endif
                                                    @if($mfo->receiving_method_cash)
                                                        <span>наличными</span>
                                                    @endif
                                                </td>

                                        </tr>
                                        @if($mfo->license)
                                            <tr class="table-light__row">
                                                <td class="table-light__cell">Лицензия</td>
                                                <td class="table-light__cell article-content"><span>{{$mfo->license}}</span></td>
                                            </tr>
                                        @endif

                                        @if($mfo->registration)
                                            <tr class="table-light__row">
                                                <td class="table-light__cell">Регистрация</td>
                                                <td class="table-light__cell article-content"><span>{{$mfo->registration}}</span></td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mfo-content__item mfo-contacts">
                                    <div class="mfo-content__item-headline">
                                        Контакты <span> {{$mfo->name}} </span>
                                    </div>
                                    <table class="table-light w-100">
                                        <tbody>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Вебсайт</td>
                                            <td class="table-light__cell article-content">
                                                <a class="" href="{{$mfo->web_site}}" rel="nofollow" target="_blank">
                                                    {{$mfo->web_site}}
                                                </a></td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Телефоны</td>
                                            <td class="table-light__cell article-content">{{$mfo->phone}}</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Почта</td>
                                            <td class="table-light__cell article-content"><a class="" href="mailto:{{$mfo->email}}">{{$mfo->email}}</a></td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Адрес</td>
                                            <td class="table-light__cell article-content">
                                                {{$mfo->getFullAddress()}}
                                            </td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Время работы поддержки </td>
                                            <td class="table-light__cell article-content">{{$mfo->work_time}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mfo-content__item mfo-recommended">
                                    <div class="mfo-content__item-headline">
                                        Другие кредиты
                                    </div>
                                    <div class="mfo-recommended__container">
                                        @foreach($additionalMfos as $additionalMfo)
                                            <div class="row pt-3 pb-3 mfo-recommended__container-item">
                                                <a href="{{route('mfo.single', $additionalMfo)}}"></a>
                                                <div class="col-11 credit-offers__block p-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-sm-4 credit-offers__block-logo d-flex align-items-center p-0">
                                                            <img class="adaptive lazyload" data-src="{{$additionalMfo->getPrimaryUrl()}}" alt="{{$additionalMfo->getPrimaryAlt()}}" title="{{$additionalMfo->getPrimaryTitle()}}">
                                                        </div>
                                                        <div class="col-12 col-sm-8 credit-offers__block-index pt-2 pt-sm-0 p-0">
                                                            <div class="row">
                                                                <div class="col-6 credit-offers__index-param">
                                                                    <div class="credit-offers__index-param__label"> Ставка в день </div>
                                                                    <div class="credit-offers__index-param__value"> от <span> @percent($additionalMfo->free_credit_bid ?? $additionalMfo->repeat_credit_bid) </span> </div>
                                                                </div>
                                                                <div class="col-6 credit-offers__index-param ">
                                                                    <div class="credit-offers__index-param__label"> Макс. сумма </div>
                                                                    <div class="credit-offers__index-param__value"> @money($additionalMfo->first_credit) </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 credit-offers__more p-0">
                                                    <div><svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 0L10 8L2 16L0 14L6 8L0 2L2 0Z" fill="currentColor"></path></svg></div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="mfo-recommended__catalogBtn">
                                        <a href="{{route('mfo.all')}}">Перейти в каталог</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 pr-0 pl-0 mfo-sidebar sidebar" id="sidebar">
                                <div class="article-body__sidebar-panel sidebar__inner" id="mfo__sb">
                                    <div class="side-bar__img">
                                        <img src="/storage/images/imgad.jpg">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="send-request__fix d-block d-md-none">
            <button class="cr-request" type="button" data-test="ui-button">Оформить кредит</button>
        </div>

        </div>
    </main>

@endsection
