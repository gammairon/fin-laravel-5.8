<div class="cards-list__container-item item">
    <div class="cardsWrapper">
        <div class="row">
            <div class="col-md-2 flex-column d-none d-md-flex justify-content-between pr-0 pl-0">
                <div class="item__imgCard">
                    <a href="{{route('bank.karta', ['bank' => $bank, 'creditCard' => $creditCard])}}">
                        <img src="{{$creditCard->getPrimaryUrl()}}" alt="{{$creditCard->getPrimaryAlt()}}" title="{{$creditCard->getPrimaryTitle()}}" class="img-card" >
                    </a>
                </div>
                <div class="for-more-card">
                    @if($isAllBanks && $bank->creditsCard->isNotEmpty())
                        <div class="more show d-none d-md-block ">
                            Еще<span class="more-cr"> {{$bank->creditsCard->count()}} </span> карт(а)
                            <i class="fa fa-angle-down "></i>
                        </div>
                        <div class="more-hidden d-none d-md-block hide">
                            Cкрыть
                            <i class="fa fa-angle-up "></i>
                        </div>
                    @endif
                </div>

            </div>
            <div class="col-12 col-md-10 display-flex flex-column item-desc pr-0 pl-0">
                <div class="row item-info">
                    <div class="col-12 item-desc__info d-flex flex-column flex-md-row justify-content-md-between align-items-start w-100 pr-0 pl-0">
                        <div class="d-flex flex-column">
                            <div class="item-desc__info-cardName">{{$creditCard->name}}</div>
                            <div class="item-desc__info-bankName">{{$bank->name}}</div>
                        </div>
                        <div class="item-desc__info-license text-right">{{$bank->license}}</div>
                    </div>
                    <div class="mob-item__imgCard d-block d-md-none">
                        <a href="{{route('bank.karta', ['bank' => $bank, 'creditCard' => $creditCard])}}">
                            <img src="{{$creditCard->getPrimaryUrl()}}" alt="{{$creditCard->getPrimaryAlt()}}" title="{{$creditCard->getPrimaryTitle()}}" class="img-card" >
                        </a>
                    </div>
                </div>
                <div class="row item-conditions">
                    <div class="col-12 col-md-2 pl-0 item-conditions__gracePeriod">
                        <div class="item-title">Льготный период</div>
                        <div class="item-num"> {{$creditCard->grace_period}} {{getPostfix($creditCard->grace_period, 'day', false)}} </div>
                        <div class="item-subInfo">Без процентов, далее  от @percent($creditCard->min_percent_bid) </div>
                    </div>
                    <div class="col-12 col-md-2 item-conditions__creditLimit">
                        <div class="item-title">Кредитный лимит</div>
                        <div class="item-num"> до @money($creditCard->max_credit_limit)</div>
                    </div>
                    <div class="col-12 col-md-2 item-conditions__service pr-0">
                        <div class="item-title">Обслуживание</div>
                        <div class="item-num"> @money($creditCard->service_cost)</div>
                    </div>
                    <div class="col-6 d-none d-md-flex flex-column justify-content-between item-conditions__group pr-0">
                        <div class="item-conditions__tags mb-3">
                            <ul class="d-flex flex-wrap">
                                @if($creditCard->pay_wave)
                                    <li class="tags-item paypass"><p class="d-flex">PayWave/PayPass</p></li>
                                @endif
                                @if($creditCard->visa)
                                    <li class="tags-item visa">
                                        <p class="d-flex"><span class="pr-1">Платежная система</span>Visa</p>
                                    </li>
                                @endif
                                @if($creditCard->master_card)
                                    <li class="tags-item mastercard">
                                        <p class="d-flex"><span class="pr-1">Платежная система</span>Mastercard</p>
                                    </li>
                                @endif
                                @if($creditCard->google_pay)
                                    <li class="tags-item googlepay"><p class="d-flex">Google Play <span class="pl-1">приложение</span></p></li>
                                @endif
                                @if($creditCard->app_store)
                                    <li class="tags-item appstore"><p class="d-flex">AppStore <span class="pl-1">приложение</span></p></li>
                                @endif
                            </ul>
                        </div>
                        <div class="item-conditions__btnBlock d-flex justify-content-between align-items-end">
                            <div class="btn__moreInfo">
                                <a href="{{route('bank.karta', ['bank' => $bank, 'creditCard' => $creditCard])}}">Подробнее</a>
                            </div>
                            <div class="btn__goToSite">
                                <button onclick="window.open('{{$creditCard->ref_link}}')">Перейти <span>на сайт</span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex d-md-none flex-column mob-row">
                    <div class="row">
                        <div class="col-12 pr-0 pl-0">
                            <div class="go-to-site">
                                <button onclick="window.open('{{$creditCard->ref_link}}')">Перейти на сайт </button>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-6 pr-0 pl-0 for-more-card">
                            @if($isAllBanks && $bank->creditsCard->isNotEmpty())
                                <div class="more pb-2">
                                    Еще<span class="more-cr"> {{$bank->creditsCard->count()}} </span> карта
                                    <i class="fa fa-angle-down "></i>
                                </div>
                                <div class="more-hidden hide show d-block d-md-none pb-2">
                                    Cкрыть
                                    <i class="fa fa-angle-up "></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-6 pr-0 pl-0">
                            <div class="btn__moreInfo">
                                <a href="{{route('bank.karta', ['bank' => $bank, 'creditCard' => $creditCard])}}"> Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
