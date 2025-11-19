<template>
    <div class="consumer-loans__container-item">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 flex-column d-flex justify-content-start pl-0 pr-0">
                <div class="consumer-loans__logo">
                    <a href="javascript:void(0);" rel="nofollow" :data-href="mfo.ref_link" class="redirect">
                        <img :src="mfo.primary_img.url" :alt="mfo.primary_img.alt" :title="mfo.primary_img.title" class="mfo_logo" >
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-10 pr-0 pl-0">
                <div class="consumer-loans__conditionsShort d-flex justify-content-between">
                    <div class="conditionsShort-item" id="rate">
                        <div class="item-num font-weight-bold"> {{$root.percent(mfo.free_credit_bid)}} </div>
                        <span>Cтавка</span>
                    </div>
                    <div class="conditionsShort-item" id="sum">
                        <div class="item-num"> {{$root.money(mfo.min_amount)}} - {{$root.money(mfo.max_amount)}}</div>
                        <span>Сумма</span>
                    </div>
                    <div class="conditionsShort-item" id="term">
                        <div class="item-num"> {{mfo.min_term}} дн. - {{mfo.max_term}} дн.</div>
                        <span>Срок</span>
                    </div>
                    <div class="conditionsShort-item d-none d-xl-flex" id="consideration">
                        <div class="item-num"> до {{mfo.time_review}} дн.</div>
                        <span>Рассмотрение</span>
                    </div>
                    <div class="go-to-site d-none d-md-flex align-items-center">
                        <a href="javascript:void(0);" rel="nofollow" :data-href="mfo.ref_link" class="btn__goToSite green redirect">Перейти</a>
                    </div>
                </div>
                <div class="row consumer-loans__conditionsAdd">
                    <div class="col-12 col-md-10 p-0">
                        <div class="d-flex flex-column">
                            <p>Возраст заемщика: <span> от {{mfo.min_age}} лет </span>
                            </p>
                            <p>Получение займа:
                                <span>
                                    <span v-if="mfo.receiving_method_card">- на карту</span>
                                    <span v-if="mfo.receiving_method_cash">- наличными</span>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 p-0 d-flex align-items-start align-items-md-end justify-content-start justify-content-md-end">
                        <div class="accordion-show more-accordion" v-if="!showMore" @click="showMore = !showMore">
                            Подробнее
                            <i class="fa fa-angle-down "></i>
                        </div>
                    </div>
                </div>
                <transition name="slide">
                    <div class="accordion-item more-info__block pt-3" v-show="showMore">
                        <div class="row">
                            <div class="col-6 pl-0">
                                <p>Сумма первого кредита: {{$root.money(mfo.first_credit)}}</p>
                                <p>Специальное предложение: {{mfo.special_offer}}</p>
                            </div>
                            <div class="col-6 pr-0">
                                <p>Телефоны: {{mfo.phone}}</p>
                                <p>Почта: {{mfo.email}}</p>
                                <p>Адрес: {{mfo.full_address}}</p>
                                <p>Время работы поддержки: {{mfo.work_time}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 pl-0">
                                <a :href="mfo.self_link" >Подробнее </a>
                            </div>
                            <div class="col-6 pr-0">
                                <div class="more-accordion accordion-hidden" v-if="showMore" @click="showMore = !showMore">
                                    Скрыть
                                    <i class="fa fa-angle-up "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
                <div class="go-to-site mob d-md-none d-flex align-items-center mt-4">
                    <a href="javascript:void(0);" rel="nofollow" :data-href="mfo.ref_link" class="btn__goToSite w-100 green redirect">Перейти</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MfoListItemComponent",

        props: {
            mfo: Object,
        },

        data(){
          return {
              showMore: false,
          }
        },

        methods: {
            openWindow(){
                function getCookie(name) {
                    var value = "; " + document.cookie;
                    var parts = value.split("; " + name + "=");
                    if (parts.length == 2) return parts.pop().split(";").shift();
                }

                if (getCookie('Nominal') == undefined){
                    function setCookie(cname, cvalue, exdays) {
                        var d = new Date();
                        d.setTime(d.getTime() + (exdays*24*60*60*1000));
                        var expires = "expires="+ d.toUTCString();
                        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                    }
                    //Parse URL
                    var _GET = (function () {
                        var _get = {};
                        var re = /[?&]([^=&]+)(=?)([^&]*)/g;
                        while (m = re.exec(location.search))
                            _get[decodeURIComponent(m[1])] = (m[2] == '=' ? decodeURIComponent(m[3]) : !0);
                        return _get
                    })();
                    var urlData = _GET;

                    var cookieValue = getCookie('Nominal');
                    var keyValue = getCookie('Nominal-GLG');

                    if (urlData.sub1 == undefined){
                        setCookie('Nominal', 'Organic', 1/5);

                    } else if (cookieValue != 'undefined') {
                        setCookie('Nominal', urlData.sub1, 1/5);
                    };

                    if (urlData.utm_term == undefined){
                        setCookie('Nominal-GLG', 'NoKeyword', 1/5);
                    } else if (keyValue != 'undefined') {
                        setCookie('Nominal-GLG', urlData.utm_term, 1/5);
                    };
                }
                $('.redirect').each(function () {
                    $(this).attr('data-href', $(this).attr('data-href') + '&sub1=' + getCookie('Nominal') + '&sub2=' + getCookie('Nominal-GLG'));
                });

                $('.redirect').click(function () {
                    var url = $(this).data('href');
                    if (url !== undefined) {

                        var win = window.open(url, "_blank");
                        setTimeout(function (){
                            if(win.closed)
                                window.location.replace(url);
                            else
                                win.focus();
                        }, 100);

                        return !1
                    }
                });

              window.open(this.mfo.ref_link);
            },
        }
    }
</script>
