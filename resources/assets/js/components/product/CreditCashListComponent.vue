<template>
    <div>
        <section class="list-credits__calculator">
            <div class="container container-page">
                <div class="row">
                    <div class="col p-0">
                        <div class="list-credits__calculator-filter w-100">
                            <div class="row list-credits__calculator-filter__container d-flex justify-content-between align-items-end">
                                <div id="filter_amount" class="form-items d-none d-md-flex col-md-5 flex-column">
                                    <label for="amount_input">Сумма кредита</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-item numeric" id="amount_input" placeholder="340 000" @keypress="validateNumber" v-model="amount_input"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">грн.</span>
                                        </div>
                                        <div class="slider-range kredit-amount">
                                            <input id="amount_slider" type="range" v-model="amount_slider" :min="min_amount" :max="max_amount" step="100" class="custom-range slider__input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 filter-group__item " id="filter_term">
                                    <label for="payment-term">Минимальный срок</label>
                                    <select class="payment-term__select" id="payment-term" v-model="payment_term">
                                        <option value="0">Любой</option>
                                        <option value="1">1 месяц</option>
                                        <option value="3">3 месяца</option>
                                        <option value="6">6 месяцев</option>
                                        <option value="9">9 месяцев</option>
                                        <option value="12">1 год</option>
                                        <option value="24">2 года</option>
                                        <option value="36">3 года</option>
                                        <option value="48">4 года</option>
                                        <option value="60">5 лет</option>
                                        <option value="72">6 лет</option>
                                    </select>
                                    <span>
                                        <svg><use xlink:href="#arrow-down-thin">
                                            <svg viewBox="0 0 8.1 4.8" id="arrow-down-thin" xmlns="http://www.w3.org/2000/svg"><path d="M7.8.4L4.1 4.1.4.4"></path></svg>
                                        </use></svg>
                                    </span>
                                </div>
                                <div class="col-12 col-md-3  filter-group__item pr-0">
                                    <div class="send-request">
                                        <button id="do_filter" @click="doFilterCredits">Подобрать</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="list-credits__consumer-loans">
            <div class="container container-page">
                <div id="catalog-credit-cash" class="list-credits__consumer-loans__container animated">
                    <div class="row consumer-loans__container-header">
                        <div class="col-3 col-lg-2 text-center container-header-item">
                            <a href="javascript:void(0);" :class="sort.field === 'bank' ? 'active':''" @click="setSortField('bank')">
                                <span>Банк</span>
                                <i :class="sort.desc && sort.field === 'bank' ? 'fa fa-angle-up ml-1':'fa fa-angle-down ml-1'"></i>
                            </a>

                        </div>
                        <div class="col-3 col-lg-2 text-center container-header-item">

                            <a href="javascript:void(0);" :class="sort.field === 'bid' ? 'active':''" @click="setSortField('bid')">
                                <span>Ставка</span>
                                <i :class="sort.desc && sort.field === 'bid' ? 'fa fa-angle-up ml-1':'fa fa-angle-down ml-1'"></i>
                            </a>
                        </div>
                        <div class="col-3 col-lg-2 text-center container-header-item">
                            <a href="javascript:void(0);" :class="sort.field === 'amount' ? 'active':''" @click="setSortField('amount')">
                                <span>Сумма</span>
                                <i :class="sort.desc && sort.field === 'amount' ? 'fa fa-angle-up ml-1':'fa fa-angle-down ml-1'"></i>
                            </a>
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

                    <credit-cash-list-item v-for="(credit, key) in filteredCredits" :credit="credit" :key="key" ></credit-cash-list-item>
                </div>
            </div>
        </section>
    </div>

</template>

<script>
    export default {
        name: "CreditCashListComponent",
        props: {
            credits: Array,
            min_amount: Number,
            max_amount: Number,
        },
        data(){
            return {
                amount_input: 0,
                amount_slider: 0,
                payment_term: 0,
                filteredCredits: [],
                sort: {
                    field: null,
                    desc: false
                },
            }
        },
        created() {
            console.log(this.credits);
            this.filteredCredits = this.credits;
            this.amount_slider = this.amount_input = this.min_amount;
        },
        watch: {
            amount_input(value){
                if(value < this.min_amount){
                    this.amount_input = this.min_amount;
                    this.amount_slider = this.min_amount;
                }

                if(value > this.max_amount){
                    this.amount_input = this.max_amount;
                    this.amount_slider = this.max_amount;
                }

                this.amount_slider = value;

            },

            amount_slider(value){
                this.amount_input = value;
            },
        },
        methods: {

            validateNumber ($event) {

                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if (keyCode < 48 || keyCode > 57) {
                    $event.preventDefault();
                }
            },

            doFilterCredits(){
                var self = this;
                this.filteredCredits = this.credits.filter(function (credit) {

                    return (
                        ( parseInt(self.amount_slider) >= parseFloat(credit.min_amount) && parseInt(self.amount_slider) <= parseFloat(credit.max_amount) )
                        &&
                        ( self.payment_term == 0 || ( parseInt(self.payment_term) >= parseFloat(credit.min_term) && parseInt(self.payment_term) <= parseFloat(credit.max_term) ) )
                    );
                });

                this.doSort();
            },

            setSortField(field){
                if(field === this.sort.field){
                    this.sort.desc = !this.sort.desc
                }else{
                    this.sort.field = field;
                    this.sort.desc = true;
                }

                this.doSort();
            },

            doSort () {

                this.filteredCredits = this.filteredCredits.concat().sort((a,b)=>{

                    switch (this.sort.field) {
                        case 'bank':
                                if(this.sort.desc){
                                    return a.bank.name > b.bank.name ? -1:1;
                                }else{
                                    return a.bank.name > b.bank.name ? 1:-1;
                                }
                            break;
                        case 'bid':
                                if(this.sort.desc){
                                    return parseFloat(a.min_bid) > parseFloat(b.min_bid) ? -1:1;
                                }else{
                                    return parseFloat(a.max_bid) > parseFloat(b.max_bid) ? 1:-1;
                                }
                            break;
                        case 'amount':
                                if(this.sort.desc){
                                    return parseFloat(a.min_amount) > parseFloat(b.min_amount) ? -1:1;
                                }else{
                                    return parseFloat(a.max_amount) > parseFloat(b.max_amount) ? 1:-1;
                                }
                            break;
                        default:
                                if(this.sort.desc){
                                    return parseFloat(a.rating) > parseFloat(b.rating) ? -1:1;
                                }else{
                                    return parseFloat(a.rating) > parseFloat(b.rating) ? 1:-1;
                                }
                            break;
                    }

                });
            }

        }
    }
</script>
