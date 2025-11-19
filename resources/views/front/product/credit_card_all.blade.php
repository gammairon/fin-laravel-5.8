@extends('layouts.app')



@section('content')
    <main>
        <div class="cards">
            <div class="cardsWrap">
                <section class="cards-header">
                    <div class="container container-page">
                        <div class="row">
                            <div class="col p-0">
                                <div class="cards-header__title d-flex justify-content-center align-items-center">
                                    <h1 class="top__title d-flex flex-column flex-md-row mb-0">
                                        {{$seo->title_page}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @if($cards->isNotEmpty())
                    <credit-card-list :cards="{{$cards}}" :banks="{{$banks}}"></credit-card-list>
                @else
                    <div class="container container-page my-4">
                        <div class="row">
                            <div class="content-text__block">
                                <div class="content-text__block-text">
                                    <h2>У этого банка пока нет предложений по кредитным картам.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <section class="cards__content">
                    <div class="cards__content-text">
                        <div class="container container-page">
                            <div class="content-text__block">
                                {!! $seo->content_page !!}
                            </div>
                        </div>
                    </div>
                    {{--<div class="cards__content-questions">
                        <div class="container container-page">
                            <div class="accordion fifin_accordion" id="accordionExample" itemscope="" itemtype="https://schema.org/FAQPage">

                                <accordion-item :item="{
                                    question: ' Потребительское кредитование',
                                    answer: 'Потребительские кредиты – это займы, которые оформляются гражданами в банке в наличной или безналичной форме. Целью кредита может быть любая покупка (телевизора, холодильника, компьютера), оплата услуг (туристической путевки, курсов, лечения) или получение наличных денег для решения повседневных нужд. Потребительские кредиты могут быть целевые и нецелевые, с обеспечением или без. Под потребительскими кредитами на Сравни.ру подразумеваются займы наличными, а также кредиты на товары и услуги.',
                                    isShow: false,
                                }"></accordion-item>
                                <accordion-item :item="{
                                    question: 'Ставки по потребительским кредитам',
                                    answer: 'Стоимость потребительского кредита зависит от многих параметров: суммы, срока, вида валюты, набора предоставляемых документов, кредитной истории и других параметров. На кредите можно сэкономить, если оформить его на небольшой срок. Претендовать на минимальную процентную ставку могут заемщики с положительной кредитной историей, предоставившие полный пакет документов и имеющие доход, из которого на платежи по кредиту будет уходить не более 40% ежемесячного дохода. Также скидку могут получить заемщики, получающие заработную плату через банк, в котором запрашивают кредит.',
                                    isShow: false,
                                }"></accordion-item>
                                    <accordion-item :item="{
                                    question: 'Выгодные потребительские кредиты',
                                    answer: 'Преимуществом потребительского кредита является возможность быстро получить деньги на любые цели. Таким образом, не нужно долго копить самому, рискую что, например, товар или услуга могут подорожать. У граждан есть возможность приобрести кредит непосредственно в магазине или в любом ближайшем отделении банка.',
                                    isShow: false,
                                }"></accordion-item>

                            </div>
                        </div>
                    </div>--}}
                </section>
            </div>
        </div>
    </main>
@endsection
