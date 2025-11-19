<template>
    <div id="cr-calc" class="row d-flex justify-content-between" >
        <div class="col-12 col-lg-8 col-md-7 payment">
            <h2> Расчет кредита </h2>
            <div class="form-items d-none d-md-flex flex-column">
                <label for="amount_money">Сумма кредита</label>
                <div class="input-group">
                    <input type="text" @change="blurAmountDisplay" class="form-control form-item numeric" id="amount_money" placeholder="340 000" v-model="amountDisplay" />
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">грн.</span>
                    </div>
                    <div class="slider-range kredit-amount">

                        <input type="range" :max="max" :min="min" :step="step" v-model="amount" class="custom-range slider__input">
                    </div>
                </div>
            </div>
            <div class="payment-items d-none d-md-flex flex-column">
                <label for="payment-term">На какой срок</label>
                <select class="payment-term__select" name="subscription-plan" id="payment-term" v-model="term">
                    <option value="4">4 мес</option>
                    <option value="6">6 мес</option>
                    <option value="12">1 год</option>
                    <option value="24">2 года</option>
                    <option value="36">3 года</option>
                    <option value="48">4 года</option>
                    <option value="60">5 лет</option>
                    <option value="72">6 лет</option>
                </select>
                <span><svg><use xlink:href="#arrow-down-thin"><svg viewBox="0 0 8.1 4.8" id="arrow-down-thin" xmlns="http://www.w3.org/2000/svg"><path d="M7.8.4L4.1 4.1.4.4"></path></svg></use></svg></span>
            </div>
        </div>
        <div class="col-12 col-md-4 calculator d-flex flex-column">
            <div class="d-flex mb-2">
                <div class="sum-kredit d-md-none d-flex flex-column w-50 mr-2">
                    <p>Сумма кредита</p>
                    <div class="sum-credit__num"> от <span>{{amount}} </span>грн</div>
                </div>
                <div class="calculator-rate">
                    <p>Ставка</p>
                    <div class="calculator-rate__num"> от <span>{{bid}} </span>% </div>
                </div>
            </div>
            <div class="d-flex pt-2">
                <div class="calculator-payment mr-2">
                    <p>Ежемесячный платёж</p>
                    <div class="calculator-payment__num"> от <span>{{month_amount}} </span>грн</div>
                </div>
                <div class="calc-credit d-md-none d-block">
                    <button @click="showModal = true">Калькулятор</button>
                </div>
            </div>
            <div class="send-request">
                <button @click="openWindow" >Отправить заявку</button>
            </div>
        </div>

        <modal v-if="showModal" @close="showModal = false">
            <h3 slot="header">Расчет кредита</h3>

            <div slot="body">
                <div class="d-flex flex-column mb-2">
                    <div class="form-items d-flex flex-column">
                        <label for="amount_money">Сумма кредита</label>
                        <div class="input-group">
                            <input type="text" @change="blurAmountDisplay" class="form-control form-item numeric" id="amount_money" placeholder="340 000" v-model="amountDisplay" />
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">грн.</span>
                            </div>
                            <div class="slider-range kredit-amount">

                                <input type="range" :max="max" :min="min" :step="step" v-model="amount" class="custom-range slider__input">
                            </div>
                        </div>
                    </div>
                    <div class="payment-items d-flex flex-column">
                        <label for="payment-term">На какой срок</label>
                        <select class="payment-term__select" name="subscription-plan" id="payment-term" v-model="term">
                            <option value="4">4 мес</option>
                            <option value="6">6 мес</option>
                            <option value="12">1 год</option>
                            <option value="24">2 года</option>
                            <option value="36">3 года</option>
                            <option value="48">4 года</option>
                            <option value="60">5 лет</option>
                            <option value="72">6 лет</option>
                        </select>
                        <span><svg><use xlink:href="#arrow-down-thin"><svg viewBox="0 0 8.1 4.8" id="arrow-down-thin" xmlns="http://www.w3.org/2000/svg"><path d="M7.8.4L4.1 4.1.4.4"></path></svg></use></svg></span>
                    </div>
                </div>
            </div>
        </modal>
    </div>

</template>

<script>

    import ModalComponent from './../ModalComponent';

    export default {

        name: "CreditCashCalculatorComponent",
        props: ['creditCash'],
        components: { ModalComponent },
        data(){
            return {
                max: parseInt(this.creditCash.max_amount),
                min: parseInt(this.creditCash.min_amount),
                step: 1,
                term: 4,
                amountDisplay: parseInt(this.creditCash.min_amount),
                amount: parseInt(this.creditCash.min_amount),
                bid: this.getMinBid(),
                showModal: false
            }
        },
        created(){
            //console.log(this.creditCash);
        },

        watch:{
            amountDisplay(newVal, oldVal){
                newVal = $.trim(newVal);
                if(!$.isNumeric(newVal)){
                    this.amountDisplay = newVal.substring(0, newVal.length - 1);
                    return;
                }

                if(newVal > this.max)
                    this.amountDisplay = this.max;
                else if(newVal < this.min)
                    return;
                else
                    this.amount = newVal;
            },
            amount(newVal){
                this.amountDisplay = newVal;
            },
        },

        computed:{
            month_amount(){
                return Math.ceil( (this.amount * this.bid/100) + this.amount/this.term );
            }
        },

        methods:{
            getMinBid(){
                let min_bid = this.creditCash.bids[0].percent;

                for (var i = 1; i < this.creditCash.bids.length; i++){
                    min_bid = this.creditCash.bids[i].percent < min_bid ? this.creditCash.bids[i].percent:min_bid;
                }

                return min_bid;
            },

            blurAmountDisplay(event){

                if(event.target.value == ''){
                    this.amountDisplay = this.min;
                    return;
                }

                let amountDisplay = parseInt(event.target.value);

                if(amountDisplay < this.min)
                    this.amountDisplay = this.min;
            },

            openWindow(){
                window.open(this.creditCash.ref_link);
            },
        },
    }
</script>
