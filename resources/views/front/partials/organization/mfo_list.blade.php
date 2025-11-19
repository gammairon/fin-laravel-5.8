@foreach($mfos as $mfo)
    <div class="consumer-loans__container-item">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 flex-column d-flex justify-content-start pl-0 pr-0">
                <div class="consumer-loans__logo">
                    <a href="javascript:void(0)" rel="nofollow" data-href="{{$mfo->ref_link}}" class="redirect">
                        <img src="{{$mfo->getPrimaryUrl()}}" alt="{{$mfo->getPrimaryAlt()}}" title="{{$mfo->getPrimaryTitle()}}" class="mfo_logo" >
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-10 pr-0 pl-0">
                <div class="consumer-loans__conditionsShort d-flex justify-content-between">
                    <div class="conditionsShort-item" id="rate">
                        <div class="item-num font-weight-bold"> @percent($mfo->free_credit_bid ?? $mfo->repeat_credit_bid) </div>
                        <span>Cтавка</span>
                    </div>
                    <div class="conditionsShort-item" id="sum">
                        <div class="item-num"> @intNumber($mfo->min_amount) - @money($mfo->max_amount)</div>
                        <span>Сумма</span>
                    </div>
                    <div class="conditionsShort-item" id="term">
                        <div class="item-num"> {{period($mfo->min_term)}} - {{period($mfo->max_term)}}</div>
                        <span>Срок</span>
                    </div>
                    <div class="conditionsShort-item d-none d-xl-flex" id="consideration">
                        <div class="item-num"> до {{$mfo->time_review}} {{getPostfix($mfo->time_review, 'day')}} </div>
                        <span>Рассмотрение</span>
                    </div>
                    <div class="go-to-site d-none d-md-flex align-items-center">
                        <a href="javascript:void(0)" rel="nofollow" data-href="{{$mfo->ref_link}}" class="btn__goToSite redirect">Перейти</a>
                    </div>
                </div>
                <div class="row consumer-loans__conditionsAdd">
                    <div class="col-12 col-md-10 p-0">
                        <div class="d-flex flex-column">
                            <p>Возраст заемщика: <span> от {{$mfo->min_age}} лет </span>
                            </p>
                            <p>Получение займа:
                                <span>
                                    @if($mfo->receiving_method_card)
                                        <span>- на карту</span>
                                    @endif
                                    @if($mfo->receiving_method_cash)
                                        <span>- наличными</span>
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 p-0 d-flex align-items-start align-items-md-end justify-content-start justify-content-md-end">
                        <div class="accordion-show more-accordion" data-target="#more-info_{{$mfo->id}}">
                            Подробнее
                            <i class="fa fa-angle-down "></i>
                        </div>
                    </div>
                </div>
                <div id="more-info_{{$mfo->id}}" class="accordion-item more-info__block pt-3">
                    <div class="row">
                        <div class="col-6 pl-0">
                            <p>Сумма первого кредита: @money($mfo->first_credit)</p>
                            <p>Специальное предложение: {{$mfo->special_offer}}</p>
                        </div>
                        <div class="col-6 pr-0">
                            <p>Телефоны: {{$mfo->phone}}</p>
                            <p>Почта: {{$mfo->email}}</p>
                            <p>Адрес: {{$mfo->getFullAddress()}}</p>
                            <p>Время работы поддержки: {{$mfo->work_time}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 pl-0">
                            <a href="{{route('mfo.single', $mfo)}}" >Подробнее </a>
                        </div>
                        <div class="col-6 pr-0">
                            <div class="more-accordion accordion-hidden" data-target="#more-info_{{$mfo->id}}">
                                Скрыть
                                <i class="fa fa-angle-up "></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="go-to-site mob d-md-none d-flex align-items-center ">
                    <a href="javascript:void(0)" rel="nofollow" data-href="{{$mfo->ref_link}}" class="btn__goToSite w-100 redirect">Перейти</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
