@extends('layouts.app')


@section('content')
    <main>
        <div class="consumer-credit">
            <section class="consumer-credit__header">
                <div class="container container-page">
                    <div class="consumer-credit__header-top w-100">
                        <div class="row">
                            <div class="col-12 back pr-0 pl-0 d-none d-md-block">
                                <a href="{{route('bank.credity', $bank)}}">
                                    Вернуться к расчету
                                </a>
                            </div>
                            <div class="col-12 back-mob pr-0 pl-0 d-md-none d-block">
                                <a href="{{route('bank.credity', $bank)}}">
                                    <svg class="back-mob__btn"><use xlink:href="#arrow">
                                            <svg viewBox="0 0 16.7 15.7" id="arrow" xmlns="http://www.w3.org/2000/svg"><path d="M16.7 7.3H1.9L8.1.7 7.3 0 0 7.9l7.3 7.8.8-.7-6.3-6.7h14.9"></path></svg>
                                        </use></svg>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-8 consumer-credit__header-top__title pr-md-4 pr-0 pl-0">
                                <div class="logo-img mob d-block d-md-none">
                                    <img class="lazyload" data-src="{{$creditCash->getPrimaryUrl()}}" alt="{{$creditCash->getPrimaryAlt()}}" title="{{$creditCash->getPrimaryTitle()}}">
                                </div>
                                <h1 class="top__title"> {{$creditCash->name}} </h1>
                                <h2 class="top__sub-title">{{$creditCash->subtitle}} </h2>
                            </div>
                            <div class="col-12 col-md-4 d-none d-md-flex justify-content-end consumer-credit__header-top__logo pr-0 pl-0">
                                <div class="logo-img">
                                    <img class="lazyload" data-src="{{$creditCash->getPrimaryUrl()}}" alt="{{$creditCash->getPrimaryAlt()}}" title="{{$creditCash->getPrimaryTitle()}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="consumer-credit__header-bottom">
                        <div class="consumer-credit__line"></div>
                        <div class="row">
                            <div class="col-12 col-md-6 consumer-credit__header-bottom__table pr-0 pl-0" >
                                <ul class="mb-0">
                                    <li class="table-item">

                                        <div class="table-item__icon">
                                            <svg class="icon_t"><use xlink:href="#percent">
                                                    <svg viewBox="0 0 17.2 17.2" id="percent" xmlns="http://www.w3.org/2000/svg"><path d="M8.6 17.2C3.9 17.2 0 13.4 0 8.6 0 3.9 3.8 0 8.6 0s8.6 3.8 8.6 8.6c-.1 4.8-3.9 8.6-8.6 8.6zM8.6 1C4.4 1 1 4.4 1 8.6s3.4 7.6 7.6 7.6 7.6-3.4 7.6-7.6C16.1 4.4 12.8 1 8.6 1z"></path><path d="M7.6 5.9c0 .7-.5 1.3-1.2 1.3S5.1 6.7 5.1 6v-.1c0-.7.6-1.2 1.3-1.2.6 0 1.2.5 1.2 1.2m4.4 5.3c0 .7-.5 1.3-1.2 1.3s-1.3-.5-1.3-1.2v-.1c0-.7.6-1.2 1.3-1.2.6.1 1.2.6 1.2 1.2m-6.9.3l6.2-6.4.7.7-6.2 6.4-.7-.7z"></path></svg>
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="table-item__desc d-flex">
                                            <div class="table-item__desc-p">
                                                Процентная ставка: </div> <div><b class="pl-1">от @percent($creditCash->getMinBid()) </b></div>
                                        </div>
                                    </li>
                                    <li class="table-item">
                                        <div class="table-item__icon">
                                            <svg class="icon_t"><use xlink:href="#bank">
                                                    <svg viewBox="0 0 16 16" id="bank" xmlns="http://www.w3.org/2000/svg"><path d="M15 3.7v-.2c0-2-2.8-3.4-6.9-3.4C4.1.1 1 1.5 1 3.4v8.7c0 2.1 3.1 3.6 7.2 3.6 4 0 6.8-1.5 6.8-3.6V3.7zM2 5.2c1.3 1 3.8 1.5 6.2 1.5 2.6 0 4.7-.5 5.9-1.4v2.6c0 1.2-2.2 2.5-5.8 2.5C4.5 10.4 2 9.1 2 7.9V5.2zm6.2-4.1c3.7 0 5.9 1.2 5.9 2.4 0 1.3-2.5 2.2-5.9 2.2C4.4 5.7 2 4.5 2 3.5c0-1.2 2.5-2.4 6.2-2.4zm5.9 11c0 1.5-2.7 2.6-5.9 2.6-3.7 0-6.2-1.4-6.2-2.6V9.7c1.2 1 3.5 1.6 6.2 1.6 2.6 0 4.7-.6 5.9-1.6v2.4z"></path></svg>
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="table-item__desc d-flex">
                                            <div class="table-item__desc-p">
                                                Сумма кредита:
                                            </div>
                                            <div>
                                                <b class="pl-1"> @money($creditCash->min_amount) - @money($creditCash->max_amount)</b>
                                            </div>
                                        </div>
                                    </li><li class="table-item">
                                        <div class="table-item__icon">
                                            <svg class="icon_t"><use xlink:href="#calendar">
                                                    <svg viewBox="0 0 15 17" id="calendar" xmlns="http://www.w3.org/2000/svg"><path d="M12 2V0h-1v2H4V0H3v2H0v15h15V2h-3zm2 14H1V7h13v9zm0-10H1V3h2v1h1V3h7v1h1V3h2v3z"></path><path d="M5.8 9.7l.4.4 1-1V14h.6V8.3h-.6"></path></svg>
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="table-item__desc d-flex">
                                            <div class="table-item__desc-p">
                                                Срок:
                                            </div>
                                            <div><b class="pl-1"> {{period( $creditCash->min_term )}} - {{period( $creditCash->max_term )}}</b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 consumer-credit__header-bottom__container pr-0 pl-0">
                                <ul>
                                    <li class="table-item">
                                        <div class="table-item__icon">
                                            <svg class="icon_t"><use xlink:href="#list">
                                                    <svg viewBox="0 0 16 17" id="list" xmlns="http://www.w3.org/2000/svg"><path d="M10.6.5H.5v15.7h14.6V5.1L10.6.5zm-.1 1.4l3.4 3.4h-3.4V1.9zm-9 13.3V1.5h8v4.8h4.6v8.9H1.5z"></path></svg>
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="table-item__desc d-flex">
                                            <div class="table-item__desc-p">
                                                Документы:
                                            </div>
                                            <div><b class="pl-1"><span>{{$creditCash->getFirstDocument()}}</span></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="table-item">
                                        <div class="table-item__icon">
                                            <svg class="icon_t"><use xlink:href="#user">
                                                    <svg viewBox="0 0 16 17" id="user" xmlns="http://www.w3.org/2000/svg"><path d="M15.3 16.2H.5V.5h14.8v15.7zm-13.8-1h12.8V1.5H1.5v13.7z"></path><path d="M7.9 4.3c-1.4 0-2.6 1.2-2.6 2.6s1.2 2.6 2.6 2.6 2.6-1.2 2.6-2.6-1.2-2.6-2.6-2.6zm0 4.2c-.9 0-1.6-.7-1.6-1.6 0-.9.7-1.6 1.6-1.6.9 0 1.6.7 1.6 1.6 0 .9-.7 1.6-1.6 1.6zm2.7 4.1s-1-1.7-2.7-1.7c-1.6 0-2.6 1.7-2.6 1.7l-.9-.5c0-.1 1.3-2.2 3.5-2.2s3.5 2.2 3.5 2.3l-.8.4z"></path></svg>
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="table-item__desc d-flex">
                                            <div class="table-item__desc-p">
                                                Возраст заемщика:
                                            </div>
                                            <div>
                                                <b class="pl-1">{{$creditCash->min_age}} лет - {{$creditCash->max_age}} лет</b>
                                            </div>
                                        </div>
                                    </li><li class="table-item">
                                        <div class="table-item__icon">
                                            <svg class="icon_t"><use xlink:href="#clock">
                                                    <svg viewBox="0 0 18.2 18.2" id="clock" xmlns="http://www.w3.org/2000/svg"><path d="M9.1 18.1c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4.1 9-9 9zm0-17c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm-.5 8V4.4h1v4.3l3.9 3.9-.7.7"></path></svg>
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="table-item__desc d-flex">
                                            <div class="table-item__desc-p">
                                                Решение:
                                            </div>
                                            <div>
                                                <b class="pl-1"> за <span>{{$creditCash->time_review}}</span> мин.</b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="consumer-credit__header-btn d-none d-md-block">
                        <div class="row">
                            <div class="col pt-0 pl-0 d-flex">
                                <div class="send-request">
                                    <button onclick="window.open('{{$creditCash->ref_link}}');" type="button">Отправить заявку</button>
                                </div>
                                <div class="calc-credit">
                                    <button onclick="window.open('{{$creditCash->ref_link}}');" type="button">Расчитать кредит</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="consumer-credit__calculate">
                <div class="container container-page">
                    <credit-cash-calculator :credit-cash="{{$creditCash}}"></credit-cash-calculator>
                </div>
            </section>
            <section class="consumer-credit__tabs">
                <div class="container container-page parent">
                    <div class="row">
                        <div class="col d-flex justify-content-center tabs__containerWrap w-100 pr-0 pl-0">
                            <div class="tabs__container d-flex">
                                <div class="tabs__container-item active">
                                    <h2 class="tab" data-target="#bids">Ставки </h2>
                                </div>
                                <div class="tabs__container-item">
                                    <h2 class="tab" data-target="#conditions">Условия</h2>
                                </div>
                                <div class="tabs__container-item">
                                    <h2 class="tab" data-target="#requirements"> Требования</h2>
                                </div>
                                <div class="tabs__container-item">
                                    <h2 class="tab" data-target="#documents"> Документы</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="bids" class="bids tabs-item tab_content block active">
                        <p class="bids-descr">Процентные ставки определяются индивидуально для каждого заемщика в соответствии с оценкой данных заемщика</p>
                        <div class="bids-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="bids-table__name"> Сумма кредита </span>
                                        </td>
                                        <td class="bids__right-column">
                                            <span class="bids-table__name"> {{$creditCash->min_term}} мес. - {{$creditCash->max_term}} мес.</span>
                                        </td>
                                    </tr>
                                    @foreach($creditCash->bids as $bid)
                                        <tr>
                                            <td>
                                                <span class="bids-table__num"> @money($bid->min_amount) - @money($bid->max_amount) </span>
                                            </td>
                                            <td class="bids__right-column">
                                                <span class="bids-table__pers"> @percent($bid->percent) </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="conditions" class="conditions tab_content block tabs-item">
                        <div class="conditions-docs">
                            <ul>
                                <li> Сумма кредита: @money($creditCash->min_amount) - @money($creditCash->min_amount) </li>
                                <li> Срок от {{$creditCash->min_term}} мес. - {{$creditCash->max_term}} мес.</li>
                            </ul>
                            <ul class="sec">
                                <li> Рассмотрение заявки {{$creditCash->time_review}} мин.</li>
                                <li>Тип погашения: {{$creditCash->repaymentToStr()}}</li>
                            </ul>
                        </div>
                        <div class="conditions-docs-add">
                            @if($creditCash->fine)
                                <div class="pb-4">
                                    <p><b>Штраф</b></p>
                                    <p>{{$creditCash->fine}}</p>
                                </div>
                            @endif
                            @if($creditCash->insurance)
                                <div class="pb-4">
                                    <p><b>Страхование</b></p>
                                    <p>{{$creditCash->insurance}}</p>
                                </div>
                            @endif
                            @if($creditCash->additional_terms)
                                <div class="pb-4">
                                    <p><b>Дополнительные условия</b></p>
                                    <p>{{$creditCash->additional_terms}}</p>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div id="requirements" class="requirements tab_content block tabs-item">
                        <ul>
                            <li> Возраст заемщика: <span> от {{$creditCash->min_age}} лет - {{$creditCash->max_age}} лет</span></li>
                            <li> Стаж: <span> {{$creditCash->experience}} </span></li>
                        </ul>
                        <ul class="sec">
                            <li> Постоянная регистрация: {{$creditCash->registration}}</li>
                            <li> Гражданство: {{$creditCash->nationality}}</li>
                        </ul>
                    </div>
                    <div id="documents" class="documents tabs-item tab_content block">
                        <div class="documents-docs">
                            <ul>
                                @foreach($creditCash->getDocuments() as $key => $document)
                                    @if(!$key % 2)
                                        <li> {{$document}} </li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul class="sec">
                                @foreach($creditCash->getDocuments() as $key => $document)
                                    @if($key % 2)
                                        <li> {{$document}} </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @if($creditCash->optional_documents)
                            <div class="documents-docs-add">
                                <p><b>Необязательные документы</b></p>
                                <p>{{$creditCash->optional_documents}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <div class="send-request__fix d-block d-md-none">
                <button onclick="window.open('{{$creditCash->ref_link}}');" class="cr-request">Отправить заявку</button>
            </div>

        </div>
    </main>
@endsection
