@if($banks->isNotEmpty())
    <div class="row card-list__sort ">
        <div> Сортировать:</div>
        <ul class="sortingDesktop d-none d-md-flex">
            <li class="ml-2 mr-2 ch_up">
                <a href="" class="active">
                    по льготному периоду
                    <i class="fa fa-angle-down"></i>
                </a>
            </li>
            <li class="ml-2 mr-2 ch_up">

                <a href="" class="active">
                    по кредитному лимиту
                    <i class="fa fa-angle-down"></i>
                </a>
            </li>
            <li class="ml-2 mr-2 ch_down">
                <a href="" class="active">
                    по обслуживанию
                    <i class="fa fa-angle-down"></i>
                </a>
            </li>
        </ul>
    </div>




    @if($isAllBanks)
        @foreach($banks as $bank)
            @php
                $creditCard = $bank->creditsCard->shift();
            @endphp

            @include('front.partials.product.credit_card_item', compact('bank', 'creditCard', 'isAllBanks'))

            @if($bank->creditsCard->isNotEmpty())
                <div class="more-cards hide">
                    @foreach($bank->creditsCard as $creditCard)
                        @include('front.partials.product.credit_card_item', compact('bank', 'creditCard', 'isAllBanks'))
                    @endforeach
                </div>
            @endif
        @endforeach
    @else
        @php
            $bank = $banks->shift();
        @endphp
        @foreach($bank->creditsCard as $creditCard)
            @include('front.partials.product.credit_card_item', compact('bank', 'creditCard', 'isAllBanks'))
        @endforeach
    @endif

@else
    <div class="row consumer-loans__container-header">
        <div class="col text-center container-header-item">
            <strong>Карты не найдены!</strong>
        </div>
    </div>
@endif
