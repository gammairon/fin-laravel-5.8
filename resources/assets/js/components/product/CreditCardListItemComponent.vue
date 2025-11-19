<template>
    <div class="cards-list__container-item item">
        <div class="cardsWrapper">
            <div class="row">
                <div class="col-md-2 flex-column d-none d-md-flex justify-content-between pr-0 pl-0">
                    <div class="item__imgCard">
                        <a :href="card.self_link">
                            <img :src="card.primary_img.url" :alt="card.primary_img.alt" :title="card.primary_img.title" class="img-card" >
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-10 display-flex flex-column item-desc pr-0 pl-0">
                    <div class="row item-info">
                        <div class="col-12 item-desc__info d-flex flex-column flex-md-row justify-content-md-between align-items-start w-100 pr-0 pl-0">
                            <div class="d-flex flex-column">
                                <div class="item-desc__info-cardName">{{card.name}}</div>
                                <div class="item-desc__info-bankName">{{card.bank.name}}</div>
                            </div>
                            <div class="item-desc__info-license text-right">{{card.bank.license}}</div>
                        </div>
                        <div class="mob-item__imgCard d-block d-md-none">
                            <a :href="card.self_link">
                                <img :src="card.primary_img.url" :alt="card.primary_img.alt" :title="card.primary_img.title" class="img-card" >
                            </a>
                        </div>
                    </div>
                    <div class="row item-conditions">
                        <div class="col-12 col-md-2 pl-0 item-conditions__gracePeriod">
                            <div class="item-title">Льготный период</div>
                            <div class="item-num"> {{card.grace_period}} дн. </div>
                            <div class="item-subInfo">Без процентов, далее  от {{$root.percent(card.min_percent_bid)}} </div>
                        </div>
                        <div class="col-12 col-md-2 item-conditions__creditLimit">
                            <div class="item-title">Кредитный лимит</div>
                            <div class="item-num"> до {{$root.money(card.max_credit_limit)}}</div>
                        </div>
                        <div class="col-12 col-md-2 item-conditions__service pr-0">
                            <div class="item-title">Обслуживание</div>
                            <div class="item-num"> {{$root.money(card.service_cost)}}</div>
                        </div>
                        <div class="col-6 d-none d-md-flex flex-column justify-content-between item-conditions__group pr-0">
                            <div class="item-conditions__tags mb-3">
                                <ul class="d-flex flex-wrap">

                                    <li v-if="card.pay_wave" class="tags-item paypass"><p class="d-flex">PayWave/PayPass</p></li>

                                    <li v-if="card.visa" class="tags-item visa">
                                        <p class="d-flex"><span class="pr-1">Платежная система</span>Visa</p>
                                    </li>

                                    <li v-if="card.master_card" class="tags-item mastercard">
                                        <p class="d-flex"><span class="pr-1">Платежная система</span>Mastercard</p>
                                    </li>

                                    <li v-if="card.google_pay" class="tags-item googlepay"><p class="d-flex">Google Play <span class="pl-1">приложение</span></p></li>

                                    <li v-if="card.app_store" class="tags-item appstore"><p class="d-flex">AppStore <span class="pl-1">приложение</span></p></li>

                                </ul>
                            </div>
                            <div class="item-conditions__btnBlock d-flex justify-content-between align-items-end">
                                <div class="btn__moreInfo">
                                    <a :href="card.self_link">Подробнее</a>
                                </div>
                                <div class="btn__goToSite">
                                    <button @click="openRefLink">Перейти на сайт</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex d-md-none flex-column mob-row">
                        <div class="row">
                            <div class="col-12 pr-0 pl-0">
                                <div class="go-to-site">
                                    <button @click="openRefLink">Перейти на сайт </button>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-6 pr-0 pl-0">
                                <div class="btn__moreInfo">
                                    <a :href="card.self_link"> Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "CreditCardListItemComponent",
        props: {
            card: Object
        },

        methods: {
            openRefLink(){
                window.open(this.card.ref_link);
            },
        },
    }
</script>
