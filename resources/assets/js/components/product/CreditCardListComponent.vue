<template>
    <section class="cards-list">
        <div class="container container-page">
            <div class="cards-list__container">
                <div class="row card-list__sort " v-if="banks.lenght > 2">
                    <div> Фильтровать:</div>

                    <ul class="sortingDesktop d-none d-md-flex w-75">
                        <li class="ml-2 mr-2 w-50">
                            <model-list-select :list="banks"
                                               v-model="bank"
                                               option-value="id"
                                               option-text="name"
                                               selected-item="{ id: 0}"
                                               placeholder="Выбрать банк"
                                               >

                            </model-list-select>
                        </li>
                    </ul>
                </div>
                <div class="row card-list__sort ">
                    <div> Сортировать:</div>
                    <ul class="sortingDesktop d-none d-md-flex">
                        <li class="ml-2 mr-2">
                            <a href="javascript:void(0);" :class="sort.field === 'grace_period' ? 'active':''" @click="doSort('grace_period')">
                                по льготному периоду
                                <i :class="sort.desc && sort.field === 'grace_period' ? 'fa fa-angle-up ml-1':'fa fa-angle-down ml-1'"></i>
                            </a>
                        </li>
                        <li class="ml-2 mr-2">

                            <a href="javascript:void(0);" :class="sort.field === 'max_credit_limit'  ? 'active':''" @click="doSort('max_credit_limit')">
                                по кредитному лимиту
                                <i :class="sort.desc && sort.field === 'max_credit_limit' ? 'fa fa-angle-up ml-1':'fa fa-angle-down ml-1'"></i>
                            </a>
                        </li>
                        <li class="ml-2 mr-2">
                            <a href="javascript:void(0);" :class="sort.field === 'service_cost' ? 'active':''" @click="doSort('service_cost')">
                                по обслуживанию
                                <i :class="sort.desc && sort.field === 'service_cost' ? 'fa fa-angle-up ml-1':'fa fa-angle-down ml-1'"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <credit-card-list-item v-for="(card, key) in actualData" :card="card" :key="key"></credit-card-list-item>
            </div>
        </div>
    </section>
</template>

<script>
    import { ModelListSelect  } from 'vue-search-select';

    export default {
        name: "CreditCardListComponent",
        components: {
            ModelListSelect
        },
        props: {
            cards: Array,
            banks: null,
        },

        data () {
            return {
                bank: {},
                sort: {
                    field: null,
                    desc: false
                },
            }
        },

        created(){
            this.banks.unshift({
                id: 0,
                name: 'Все банки',
            });
        },

        computed:{
            actualData () {
                let actualCards;
                if(!this.sort.field){
                    actualCards = this.cards;
                }
                else{
                    actualCards = this.cards.concat().sort((a,b)=>{
                        if(this.sort.desc){
                            return parseFloat(a[this.sort.field]) > parseFloat(b[this.sort.field]) ? -1:1
                        }else{
                            return parseFloat(a[this.sort.field]) > parseFloat(b[this.sort.field]) ? 1:-1
                        }
                    });
                }

                if(!$.isEmptyObject(this.bank) && this.bank.id){
                    //console.log(actualCards);
                    var self = this;
                    return actualCards.filter(function (card) {
                        return card.bank_id == self.bank.id;
                    });
                }
                //console.log(actualCards);
                return actualCards;
            }
        },

        methods: {
            doSort (field) {
                if(field === this.sort.field){
                    this.sort.desc = !this.sort.desc
                }else{
                    this.sort.field = field;
                    this.sort.desc = true;
                }
            }
        }
    }


</script>
