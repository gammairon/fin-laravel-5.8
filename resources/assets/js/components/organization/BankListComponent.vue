<template>
    <div>
        <section class="list-banks__top">
            <div class="row">
                <div class="col-12 d-flex flex-column p-0">
                    <div class="search-bank d-flex">
                        <input type="text" class="companies-search__input" placeholder="Введите название банка..." v-model="search">
                        <svg class="search-icon"><use xlink:href="#control-search">
                            <svg viewBox="0 0 23 23" id="control-search"><g class="c1"><circle cx="7.76" cy="7.76" r="5.9"></circle><path d="M11.545 11.545L13.5 13.5"></path><rect x="15.303" y="11.803" width="4" height="11" rx="2" transform="rotate(-45 17.303 17.303)"></rect></g></svg>
                        </use></svg>
                    </div>
                </div>
            </div>
        </section>
        <section class="list-banks__content">
            <div class="row list-banks__content-head d-none d-md-flex">
                <div class="list-banks__content-head-item item-sort col-2 pr-0 pl-0 pr-4 d-flex flex-row align-items-center">
                    <div> Рейтинг </div>
                    <!--<i class="fa fa-angle-down ml-1"></i>-->
                </div>
                <div class="list-banks__content-head-item item-sort col-3 pr-0 pl-4 pr-4 d-flex flex-row align-items-center" v-on:click="doSort('name')">
                    <div>Название</div>
                    <i :class="sort.desc ? 'fa fa-angle-up ml-1':'fa fa-angle-down ml-1'"></i>
                </div>
                <div class="col-4 pr-0 pl-4 pr-4">
                    Телефоны и адреса
                </div>
                <div class="col-3 pr-0 pl-4 pr-0">
                </div>
            </div>
            <div class="list-banks__content-result">
                <bank-list-item
                    v-for="(bank, index) in sortedData"
                    v-bind:bank="bank"
                    v-bind:index="index"
                    v-bind:key="bank.id"
                ></bank-list-item>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "BankListComponent",
        props: {
            banks: Array,
        },
        data(){
            return {
                actualBanks: [],
                search: null,
                sort: {
                    field: null,
                    desc: false
                },
            }
        },
        created(){
            //console.log(this.banks);
        },
        computed:{
            sortedData () {

                if(!this.sort.field){
                    this.actualBanks = this.banks;
                }
                else{
                    this.actualBanks = this.banks.concat().sort((a,b)=>{
                        if(this.sort.desc){
                            return a[this.sort.field] > b[this.sort.field] ? -1:1
                        }else{
                            return a[this.sort.field] > b[this.sort.field] ? 1:-1
                        }
                    })
                }

                if(this.search){
                    let search = $.trim(this.search);
                    return this.actualBanks.filter(function (bank) {
                        if (
                            bank.name.toLowerCase().indexOf(search.toLowerCase()) != "-1"
                        ) {
                            return bank;
                        }
                    });
                }

                return this.actualBanks;
            }
        },
        methods:{
            doSort (field) {
                if(field == this.sort.field){
                    this.sort.desc = !this.sort.desc
                }else{
                    this.sort.field = field;
                    this.sort.desc = true;
                }
            }
        },
    }
</script>
