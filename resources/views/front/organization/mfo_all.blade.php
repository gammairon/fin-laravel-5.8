@extends('layouts.app')



@section('content')
    <main>
        <div class="microcredits">
            <div class="microcreditsWrap">
                <div class="container container-page">
                    <div class="microcredits-content">
                        <div class="row main-content">
                            <div class="col-12 col-md-10 mfo__left pl-0">
                                <div class="list-microcredits-title d-flex justify-content-between align-items-center">
                                    <h1 class="top__title">
                                        {{$seo->title_page}}
                                    </h1>
                                </div>


                                <mfo-list :mfos="{{$mfos}}" :min_amount="{{$mfos->min('min_amount')}}" :max_amount="{{$mfos->max('max_amount')}}" :min_days="{{$mfos->min('min_term')}}" :max_days="{{$mfos->max('max_term')}}"></mfo-list>
                                {{--<section class="list-microcredits__calculator">
                                    <div class="list-microcredits__calculator-filter w-100 ">
                                        <div class="row list-microcredits__calculator-filter__container d-flex justify-content-between align-items-end">
                                            <div class="col-12 col-md-6">
                                                <div class="input-range-slider">
                                                    <label for="amount-money">Сумма кредита, грн.</label>
                                                    <input type="text" class="form-item" name="amount-money" id="amount-money" placeholder="340 000"/>

                                                    <div class="slider-range">
                                                        <input id="range-amount-money" type="range"  value="5" min="5" max="100" step="1" class="custom-range slider__input">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-6 input-range-slider">
                                                <div class="input-range-slider">
                                                    <label for="amount-day">Срок, дней</label>
                                                    <input type="text" class="form-item" name="amount-day" id="amount-day" placeholder="0"/>

                                                    <div class="slider-range">
                                                        <input id="range-amount-day" type="range"  value="5" min="5" max="100" step="1" class="custom-range slider__input">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex flex-column flex-md-row align-items-center justify-content-md-end pr-0 pl-0">
                                                <div class="btn-cancel mb-3 mr-md-2">
                                                    <button name="cr-cancel" type="button">Сбросить</button>
                                                </div>
                                                <div class="send-request mb-3">
                                                    <button name="cr-request" type="button">Подобрать кредиты</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div id="list-microcredits" class="list-microcredits__consumer-loans__container">
                                        @include('front.partials.organization.mfo_list', compact('mfos'))
                                    </div>
                                </section>--}}
                                <section>
                                    <div class="microcredits__content-text">
                                        <div class="content-text__block">
                                            {!! $seo->content_page !!}
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-2 pr-0 pl-0 mfo-sidebar sidebar" id="sidebar-one">
                                <div class="article-body__sidebar-panel sidebar__inner" id="mfo__sb">
                                    <div class="side-bar__img ">
                                        <img src="/storage/images/imgad.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
