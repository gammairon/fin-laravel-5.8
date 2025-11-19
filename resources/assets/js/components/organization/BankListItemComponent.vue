<template>
    <div class="row list-banks__content-result__container">
        <div class="organization-item logo d-none d-md-flex flex-column col-12 col-md-2 pl-0 pr-4">
            <div class="logo-bank">
                <a :href="bank.self_link"><img :src="bank.primary_img.url" :alt="bank.primary_img.alt" :title="bank.primary_img.title"></a>
            </div>
            <!--<div class="rating">
                <span class="rating-stars stars-5"> </span>
            </div>-->
        </div>
        <div class="organization-item info d-flex flex-row flex-md-column col-12 col-md-3 pl-4 pr-4">
            <a :href="bank.self_link" class="organization-item__title">{{bank.name}}</a>
            <!--<div class="rating d-flex d-md-none">
                <span class="rating-stars stars-5"> </span>
            </div>-->
            <div class="organization-item__license d-none d-md-block">
                {{bank.license}}
            </div>
        </div>
        <div class="organization-item col-12 col-md-4 pl-4 pr-4">
            <div class="organization-item__contacts">
                <div class="text-with-icon tel ml-4 mb-2">{{bank.phone}}</div>
                <div class="text-with-icon ml-4 adress">{{bank.full_address}}</div>
            </div>
        </div>
        <div class="organization-item col-12 col-md-3 pl-4 pr-0">
            <div class="row align-items-md-center h-100">
                <div class="col-7 pr-3 d-md-none p-0">
                    <div class="organization-item__license">{{bank.license}}</div>
                </div>
                <div class="col-5 col-md-12 pr-0 pl-3">
                    <a :href="bank.ref_link ? bank.ref_link:bank.self_link" class="btn__goToSite">Перейти</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BankListItemComponent",

        props: {
            bank: Object,
        },
    }
</script>
