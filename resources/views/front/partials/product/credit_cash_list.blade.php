@if($banks->isNotEmpty())
    <div class="row consumer-loans__container-header">
        <div class="col-3 col-lg-2 text-center container-header-item">
            <span>Банк</span>
        </div>
        <div class="col-3 col-lg-2 text-center container-header-item">
            <span>Ставка</span>
        </div>
        <div class="col-3 col-lg-2 text-center container-header-item">
            <span>Сумма</span>
        </div>
        <div class="col-2 text-center container-header-item d-none d-lg-flex">
            <span>Документы</span>
        </div>
        <div class="col-2 text-center container-header-item d-none d-lg-flex">
            <span>Требования</span>
        </div>
        <div class="col-3 col-lg-2 text-center">
            <span>Популярность</span>
        </div>
    </div>




    @if($isAllBanks)
        @foreach($banks as $bank)
            @php
                $creditCash = $bank->creditsCash->shift();
            @endphp
            <div class="consumer-loans__container-item item">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-2 flex-column d-flex justify-content-between">
                        <div class="consumer-loans__logo">
                            <a href="javascript:void(0);" rel="nofollow" onclick="window.open('{{$creditCash->ref_link}}')">
                                <img src="{{$bank->getPrimaryUrl()}}" alt="{{$bank->getPrimaryAlt()}}" title="{{$bank->getPrimaryTitle()}}" class="mfo_logo" >
                            </a>
                        </div>
                        @if($bank->creditsCash->isNotEmpty())
                            <div class="more  d-none d-md-block show">
                                Еще<span class="more-cr"> {{$bank->creditsCash->count()}} </span> кредит(а)
                                <i class="fa fa-angle-down "></i>
                            </div>
                            <div class="more-hidden hide">
                                Cкрыть
                                <i class="fa fa-angle-up "></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__rate">
                        <div class="mob-visible descr">Ставка</div>
                        <div> <span>@percent($creditCash->getMinBid()) </span></div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__sum">
                        <div class="mob-visible descr">Сумма</div>
                        <div class="d-flex flex-column pb-2"> <span>@money($creditCash->min_amount) - </span> <span>@money($creditCash->max_amount)</span> </div>
                        <div class="d-none d-md-flex"> на срок до <span class="num pl-1">{{period($creditCash->max_term)}} </span> </div>
                    </div>
                    <div class="d-none d-lg-flex col-lg-2  flex-column consumer-loans__documents">
                        @foreach($creditCash->getDocuments() as $key => $document)
                            <div> {{$document}} </div>
                        @endforeach
                    </div>
                    <div class="d-none d-lg-flex col-lg-2 display-flex flex-column consumer-loans__conditions">
                        <div> Возраст от <span class="year">{{$creditCash->min_age}}</span> лет </div>
                        <div> Стаж {{$creditCash->experience}}</div>
                    </div>
                    <div class="d-none d-md-flex col-md-3 col-lg-2 consumer-loans__button ">
                        <div class="go-to-site w-100 d-flex align-items-center">
                            <button onclick="window.open('{{$creditCash->ref_link}}')" >Отправить заявку</button>
                        </div>
                    </div>
                </div>
                <div class="row d-flex d-md-none mob-row  align-items-end">
                    @if($bank->creditsCash->isNotEmpty())
                        <div class="col-6">
                            <div class="more pb-2 show">
                                Еще<span class="more-cr"> {{$bank->creditsCash->count()}} </span> кредит(а)
                                <i class="fa fa-angle-down "></i>
                            </div>
                            <div class="more-hidden hide d-block d-md-none pb-2">
                                Cкрыть
                                <i class="fa fa-angle-up "></i>
                            </div>
                        </div>
                    @endif
                    <div class="col-6">
                        <div class="go-to-site">
                            <button onclick="window.open('{{$creditCash->ref_link}}')">Перейти</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($bank->creditsCash->isNotEmpty())
                <div class="more-credits hide">
                    @foreach($bank->creditsCash as $creditCash)
                        <div class="consumer-loans__container-item">
                                <div class="row">
                                    <div class="col-12 col-md-3 col-lg-2 flex-column d-flex justify-content-between">
                                        <div class="consumer-loans__logo">
                                            <a href="javascript:void(0);" rel="nofollow" onclick="window.open('{{$creditCash->ref_link}}')">
                                                <img src="{{$bank->getPrimaryUrl()}}" alt="{{$bank->getPrimaryAlt()}}" title="{{$bank->getPrimaryTitle()}}" class="mfo_logo" >
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__rate">
                                        <div class="mob-visible descr">Ставка</div>
                                        <div> <span>@percent($creditCash->getMinBid()) </span></div>
                                    </div>
                                    <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__sum">
                                        <div class="mob-visible descr">Сумма</div>
                                        <div class="d-flex flex-column pb-2"> <span>@money($creditCash->min_amount) - </span> <span>@money($creditCash->max_amount)</span> </div>
                                        <div class="d-none d-md-flex"> на срок до <span class="num pl-1">{{period($creditCash->max_term)}} </span> </div>
                                    </div>
                                    <div class="d-none d-lg-flex col-lg-2  flex-column consumer-loans__documents">
                                        @foreach($creditCash->getDocuments() as $key => $document)
                                            <div> {{$document}} </div>
                                        @endforeach
                                    </div>
                                    <div class="d-none d-lg-flex col-lg-2 display-flex flex-column consumer-loans__conditions">
                                        <div> Возраст от <span class="year">{{$creditCash->min_age}}</span> лет </div>
                                        <div> Стаж {{$creditCash->experience}}</div>
                                    </div>
                                    <div class="d-none d-md-flex col-md-3 col-lg-2 consumer-loans__button ">
                                        <div class="go-to-site w-100 d-flex align-items-center">
                                            <button onclick="window.open('{{$creditCash->ref_link}}')" >Отправить заявку</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex d-md-none mob-row  align-items-end">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        <div class="go-to-site">
                                            <button onclick="window.open('{{$creditCash->ref_link}}')">Перейти</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    @else
        @php
            $bank = $banks->shift();
        @endphp
        @foreach($bank->creditsCash as $creditCash)
            <div class="consumer-loans__container-item">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-2 flex-column d-flex justify-content-between">
                        <div class="consumer-loans__logo">
                            <a href="javascript:void(0);" rel="nofollow" onclick="window.open('{{$creditCash->ref_link}}')">
                                <img src="{{$bank->getPrimaryUrl()}}" alt="{{$bank->getPrimaryAlt()}}" title="{{$bank->getPrimaryTitle()}}" class="mfo_logo" >
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__rate">
                        <div class="mob-visible descr">Ставка</div>
                        <div> <span>@percent($creditCash->getMinBid()) </span></div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__sum">
                        <div class="mob-visible descr">Сумма</div>
                        <div class="d-flex flex-column pb-2"> <span>@money($creditCash->min_amount) - </span> <span>@money($creditCash->max_amount)</span> </div>
                        <div class="d-none d-md-flex"> на срок до <span class="num pl-1">{{period($creditCash->max_term)}} </span> </div>
                    </div>
                    <div class="d-none d-lg-flex col-lg-2  flex-column consumer-loans__documents">
                        @foreach($creditCash->getDocuments() as $key => $document)
                            <div> {{$document}} </div>
                        @endforeach
                    </div>
                    <div class="d-none d-lg-flex col-lg-2 display-flex flex-column consumer-loans__conditions">
                        <div> Возраст от <span class="year">{{$creditCash->min_age}}</span> лет </div>
                        <div> Стаж {{$creditCash->experience}}</div>
                    </div>
                    <div class="d-none d-md-flex col-md-3 col-lg-2 consumer-loans__button ">
                        <div class="go-to-site w-100 d-flex align-items-center">
                            <button onclick="window.open('{{$creditCash->ref_link}}')" >Отправить заявку</button>
                        </div>
                    </div>
                </div>
                <div class="row d-flex d-md-none mob-row  align-items-end">
                    <div class="col-6">
                        <div class="go-to-site">
                            <button onclick="window.open('{{$creditCash->ref_link}}')">Перейти</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@else
    <div class="row consumer-loans__container-header">
        <div class="col text-center container-header-item">
            <strong>Потребительские кредиты не найдены!</strong>
        </div>
    </div>
@endif
