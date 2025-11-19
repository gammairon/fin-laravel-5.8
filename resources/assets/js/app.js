
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {

    //window.Popper = require('popper.js').default;

    window.$ = window.jQuery = require('jquery');

    //require('bootstrap');

} catch (e) {}

require('./library');

require('./common_functions');

import 'vue-search-select/dist/VueSearchSelect.css';

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('slick-slider', require('./components/SlickSliderComponent.vue').default);
Vue.component('accordion-item', require('./components/AccordionItemComponent.vue').default);
Vue.component('modal', require('./components/ModalComponent.vue').default);

Vue.component('bank-list', require('./components/organization/BankListComponent.vue').default);
Vue.component('bank-list-item', require('./components/organization/BankListItemComponent.vue').default);
Vue.component('mfo-list', require('./components/organization/MfoListComponent.vue').default);
Vue.component('mfo-list-item', require('./components/organization/MfoListItemComponent.vue').default);

Vue.component('credit-cash-calculator', require('./components/product/CreditCashCalculatorComponent.vue').default);
Vue.component('credit-card-list', require('./components/product/CreditCardListComponent.vue').default);
Vue.component('credit-card-list-item', require('./components/product/CreditCardListItemComponent').default);
Vue.component('credit-cash-list', require('./components/product/CreditCashListComponent').default);
Vue.component('credit-cash-list-item', require('./components/product/CreditCashListItemComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {

    },

    methods: {
        money(number){
          return parseFloat(number) <= 0 ? 'Бесплатно':parseFloat(number)+' ₴';
        },

        percent(number){
            return parseFloat(number)+' %';
        },

        getPostfix(value, key, before) {
            before = before || true;

            let pluralPostfixes = [];

            if(before){
                pluralPostfixes = {
                    day : ['дня', 'дней', 'дней'],
                    month : ['месяца', 'месяцев', 'месяцев'],
                    year : ['года', 'лет', 'лет'],
                }
            }
            else{
                pluralPostfixes = {
                    day: ['день', 'дня', 'дней'],
                    month: ['месяц', 'месяца', 'месяцев'],
                    year: ['год', 'года', 'лет'],
                };
            }

            let num = value%10==1 && value%100!=11 ? 0 : (value%10>=2 && value%10<=4 && (value%100<10 || value%100>=20) ? 1 : 2);

            return pluralPostfixes[key][num];
        },

        period(term, before){
            before = before || true;

            term = parseInt(term);

            if(term < 12)
                return term +' '+ this.getPostfix(term, 'month', before);

            let years = Math.floor(term/12);


            if(term%12){
                let month = term - 12 * years;
                return years + ' ' + this.getPostfix(years, 'year', before) + ' ' + month + ' ' + this.getPostfix(month, 'month', before);
            }

            return years + ' ' + this.getPostfix(years, 'year', before);

        },

    },
});
