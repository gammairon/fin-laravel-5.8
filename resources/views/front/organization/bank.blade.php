@extends('layouts.app')



@section('content')
    <main>
        <div class="mfo bank">
            <div class="mfoWrap">
                <section class="mfo-header">
                    <div class="container container-page">
                        <div class="mfo-header__top">
                            <div class="row">
                                <div class="col-12 col-md-8 mfo-header__top-title pr-md-4 pr-0 pl-0 align-items-center align-items-md-start">
                                    <h1 class="top__title "> {{$bank->title_h1}} </h1>
                                    <h2 class="top__sub-title"> {{$bank->name}}</h2>
                                </div>
                                <div class="col-12 col-md-4 d-none d-md-flex justify-content-end mfo-header__top-logo pr-0 pl-0">
                                    <a href="" class="logo-img">
                                        <img src="{{$bank->getPrimaryUrl()}}" alt="{{$bank->getPrimaryAlt()}}" title="{{$bank->getPrimaryTitle()}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mfo-header__bottom mb-0">
                            <div class="mfo__line"></div>
                            <ul class="content-menu d-flex pl-0 pr-0 pt-0 pb-3 m-0">
                                <li>
                                    <a href="#about-bank">О банке</a>
                                </li>
                                {{--<li class="">Отделения</a>
                                </li>--}}
                                <li class="">
                                    <a href="#owner-bank">Собственники</a>
                                </li>
                                <li class="">
                                    <a href="#contact-bank">Контакты</a>
                                </li>
                                <li class="">
                                    <a href="#news-bank">Новости</a>
                                </li>
                               {{-- <li class="">Отзывы
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </section>
                <div class="container container-page">
                    <section class="mfo-content">
                        <div class="row">
                            <div class="col-12 col-md-10 mfo__left pl-0">
                                <div class="mfo-content__item bank-produkts">
                                    <div class="row">
                                        <div class="col-12 col-md-2 {{--mx-auto--}} my-auto credit-types__item">
                                            <a href="{{route('bank.credity', $bank)}}">
                                                <div class="icon credits"></div>
                                                <h3>Кредиты</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-2 {{--mx-auto--}} my-auto credit-types__item">
                                            <a href="{{route('bank.karty', $bank)}} ">
                                                <div class="icon credit-cards"></div>
                                                <h3>Кредитные карты</h3>
                                            </a>
                                        </div>
                                        {{--<div class="col-12 col-md-2 mx-auto my-auto credit-types__item">
                                            <a href="">
                                                <div class="icon debet-cards"></div>
                                                <h3>Дебетовые карты</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-2 mx-auto my-auto credit-types__item">
                                            <a href="">
                                                <div class="icon deposits"></div>
                                                <h3>Депозиты</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-2 mx-auto my-auto credit-types__item">
                                            <a href="">
                                                <div class="icon mortgage"></div>
                                                <h3>Ипотека</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-2 mx-auto my-auto credit-types__item">
                                            <a href="">
                                                <div class="icon autocredits"></div>
                                                <h3>Автокредиты</h3>
                                            </a> <p id="about-bank"></p>
                                        </div>--}}
                                    </div>
                                </div>
                                <div class="mfo-content__item bank-about">
                                    <div class="mfo-content__item-headline">
                                        {{$bank->name}}
                                    </div>
                                    <div class="description">
                                        <div class="info short">
                                            {!! $bank->description !!}
                                        </div>
                                    </div>
                                    @if($bank->description)
                                        <div class="more-text mt-4"> Читать полностью </div>
                                    @endif
                                    <p id="owner-bank"></p>
                                </div>
                                <div class="mfo-content__item bank-owner">
                                    <div class="mfo-content__item-headline">
                                        Собственники <span> Газпромбанк</span>а
                                    </div>
                                    <table class="table-light w-100">
                                        <tbody>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Прямой акционер</td>
                                            <td class="table-light__cell article-content">{{$bank->shareholders}}</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Страна капитала</td>
                                            <td class="table-light__cell article-content">{{$bank->country_capital}}</td>
                                        </tr>
                                        </tbody>
                                    </table> <p id="contact-bank"></p>
                                </div>
                                <div class="mfo-content__item bank-contacts">
                                    <div class="mfo-content__item-headline">
                                        Контакты <span> {{$bank->name}}</span>а
                                    </div>
                                    <table class="table-light w-100">
                                        <tbody>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Главный офис</td>
                                            <td class="table-light__cell article-content">{{$bank->getFullAddress()}}</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Телефоны</td>
                                            <td class="table-light__cell article-content">{{$bank->phone}}</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Почта</td>
                                            <td class="table-light__cell article-content"><a class="" href="mailto:info@gazprom.ua">{{$bank->email}}</a></td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Вебсайт</td>
                                            <td class="table-light__cell article-content">
                                                <a class="" href="{{$bank->web_site}}" rel="nofollow" target="_blank">
                                                    {{$bank->web_site}}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">МФО</td>
                                            <td class="table-light__cell article-content">{{$bank->mfo}}</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">ЕГРПО</td>
                                            <td class="table-light__cell article-content">{{$bank->egrdpou}}</td>
                                        </tr>
                                        <tr class="table-light__row">
                                            <td class="table-light__cell">Дата регистрации банка</td>
                                            <td class="table-light__cell article-content">{{$bank->registration}}</td>
                                        </tr>
                                        </tbody>
                                    </table> <p id="news-bank"></p>
                                </div>
                                <div class="mfo-content__item bank-news mb-0">
                                    <div class="mfo-content__item-headline">
                                        Новости <span> {{$bank->name}}</span>
                                    </div>
                                    <div class="bank-news__container">
                                        @foreach($bank->getNews() as $post)
                                            <div class="bank-news__container-article">
                                                <a href="{{$post->getLink()}}" class="article-title">
                                                    {{$post->name}}
                                                </a>
                                                <p> {{$post->excerpt}}</p>
                                            </div>
                                        @endforeach
                                        <a href="{{route('news')}}" class="more-news"> Посмотреть все новости </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 pr-0 pl-0 mfo-sidebar" id="sidebar-one">
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
        </div>
    </main>
@endsection
