<template>
    <div class="consumer-loans__container-item item">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 flex-column d-flex justify-content-between">
                <div class="consumer-loans__logo">
                    <a :href="credit.self_link" >
                        <img :src="credit.bank.primary_img.url" :alt="credit.bank.primary_img.alt" :title="credit.bank.primary_img.title" class="mfo_logo" >
                    </a>
                </div>
                <div>
                    <a :href="credit.self_link" >
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__rate">
                <div class="mob-visible descr">Ставка</div>
                <div> <span>{{$root.percent(credit.min_bid)}} </span></div>
            </div>
            <div class="col-6 col-md-3 col-lg-2 display-flex flex-column consumer-loans__sum">
                <div class="mob-visible descr">Сумма</div>
                <div class="d-flex flex-column pb-2"> <span>{{$root.money(credit.min_amount)}} - </span> <span>{{$root.money(credit.max_amount)}}</span> </div>
                <div class="d-none d-md-flex"> на срок до <span class="num pl-1">{{$root.period(credit.max_term)}} </span> </div>
            </div>
            <div class="d-none d-lg-flex col-lg-2  flex-column consumer-loans__documents">
                <div v-for="document in credit.documents"> {{document}} </div>
            </div>
            <div class="d-none d-lg-flex col-lg-2 display-flex flex-column consumer-loans__conditions">
                <div> Возраст от <span class="year">{{credit.min_age}}</span> лет </div>
                <div> Стаж {{credit.experience}}</div>
            </div>
            <div class="d-none d-md-flex col-md-3 col-lg-2 consumer-loans__button ">
                <div class="go-to-site w-100 d-flex align-items-center">
                    <button @click="openWindow" >Отправить заявку</button>
                </div>
            </div>
        </div>
        <div class="row d-flex d-md-none mob-row  align-items-end">
            <div class="col-6">
                <div class="go-to-site">
                    <button @click="openWindow">Перейти</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreditCashListItemComponent",
        props: {
            credit: Object,
        },

        created() {
            console.log(this.credit);
        },

        methods: {
            openWindow(){
                window.open(this.credit.ref_link);
            },
        }
    }
</script>
