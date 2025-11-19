<template>
    <div >
        <section class="list-microcredits__calculator">
            <div class="list-microcredits__calculator-filter w-100 ">
                <div class="row list-microcredits__calculator-filter__container d-flex justify-content-between align-items-end">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-range-slider">
                            <label for="amount-money">Сумма кредита, грн.</label>
                            <input type="text" class="form-item" name="amount-money" v-model="amount_input" @keypress="validateNumber" id="amount-money" placeholder="Сумма"  />

                            <div class="slider-range">
                                <input id="range-amount-money" type="range"  v-model="amount_slider" :min="min_amount" :max="max_amount" step="100" class="custom-range slider__input">
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6 input-range-slider mb-4">
                        <div class="input-range-slider">
                            <label for="amount-day">Срок, дней</label>
                            <input type="text" class="form-item" name="amount-day" v-model="days_input" @keypress="validateNumber" id="amount-day" placeholder="Дни"  />

                            <div class="slider-range">
                                <input id="range-amount-day" type="range"  v-model="days_slider" :min="min_days" :max="max_days" step="1" class="custom-range slider__input">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 d-flex flex-column flex-md-row align-items-center justify-content-md-end pr-0 pl-0">
                        <div class="btn-cancel mb-3 mr-md-2">
                            <button name="cr-cancel" type="button" @click="reset">Сбросить</button>
                        </div>
                        <div class="send-request mb-3">
                            <button name="cr-request" type="button" @click="doFilterMfos">Подобрать кредиты</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="list-microcredits" class="list-microcredits__consumer-loans__container">

                <mfo-list-item v-for="(mfo, key) in filteredMfos" :mfo="mfo" :key="key" ></mfo-list-item>

            </div>
        </section>
    </div>

</template>

<script>
    export default {
        name: "MfoListComponent",

        props: {
            mfos: Array,

            min_amount: Number,
            max_amount: Number,

            min_days: Number,
            max_days: Number
        },

        data(){
            return {
                amount_input: 0,
                amount_slider: 0,
                days_input: 0,
                days_slider: 0,
                filteredMfos: [],
            }
        },

        created() {

            this.filteredMfos = this.mfos;
            this.reset();
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

            days_input(value){
                if(value < this.min_days){
                    this.days_input = this.min_days;
                    this.days_slider = this.min_days;
                }

                if(value > this.max_days){
                    this.days_input = this.max_days;
                    this.days_slider = this.max_days;
                }

                this.days_slider = value;

            },

            days_slider(value){
                this.days_input = value;
            },

        },

        computed: {

        },

        methods: {
            reset(){
                this.amount_slider = this.amount_input = this.min_amount;
                this.days_slider= this.days_input = this.min_days;
            },

            validateNumber ($event) {

                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if (keyCode < 48 || keyCode > 57) {
                    $event.preventDefault();
                }
            },

            doFilterMfos(){
                var self = this;
                this.filteredMfos = this.mfos.filter(function (mfo) {

                    return (
                        ( parseInt(self.amount_slider) >= parseFloat(mfo.min_amount) && parseInt(self.amount_slider) <= parseFloat(mfo.max_amount) )
                            &&
                        ( parseInt(self.days_slider) >= parseFloat(mfo.min_term) && parseInt(self.days_slider) <= parseFloat(mfo.max_term) )
                    );
                });
            },

        }

    }
</script>
