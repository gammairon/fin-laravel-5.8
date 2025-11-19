<template>
    <slick
        ref="slick"
        :options="slickOptions"
        >
        <div class="slider-item-content d-flex">
            <div class="slide-left-part w-50 d-flex flex-column justify-content-center pl-5">
                <h5>Персональный подбор кредита</h5>
                <p>Проверь свой кредитный рейтинг и узнай, какой банк и по какой ставке одобрит тебе кредит</p>
                <p><a href="https://finfin.com.ua/mfo" class="btn btn-green">ПОДОБРАТЬ КРЕДИТ</a></p>
            </div>
            <div class="slide-right-part w-75">
                <img class="img-fluid lazyload" data-src="/storage/images/slider1.jpg" alt="">
            </div>
        </div>
        <div class="slider-item-content d-flex">
            <div class="slide-left-part w-50 d-flex flex-column justify-content-center pl-5">
                <h5>Кредитный рейтинг</h5>
                <p>Узнай свой кредитный рейтинг и получи персональные рекомендации по нему</p>
                <p><a href="https://finfin.com.ua/mfo" class="btn btn-green">ПОДОБРАТЬ КРЕДИТ</a></p>
            </div>
            <div class="slide-right-part w-75">
                <img class="img-fluid lazyload" data-src="/storage/images/slider2.jpg" alt="">
            </div>
        </div>
    </slick>
</template>

<script>
    import Slick from 'vue-slick';

    export default {
        name: "SlickSliderComponent",
        components: { Slick },

        data() {
            return {
                slickOptions: {
                    slidesToShow: 1,
                    fade: true,
                    lazyLoad: 'progressive',
                    autoplay: true,

                    // Any other options that can be got from plugin documentation
                },
            };
        },

    }
</script>
