<template>
    <div class="accordion-tpl">
        <div class="card" itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
            <div class="card-header">
                <h5 class="mb-0" itemprop="name">
                    <button class="btn btn-link collapsed" type="button" @click="isShow = !isShow">
                        {{item.question}}
                    </button>
                    <i :class=" isShow ? 'fa fa-angle-up':'fa fa-angle-down'"></i>
                </h5>
            </div>
            <transition name="slide">
                <div v-if="isShow" itemprop="acceptedAnswer" itemscope="" itemtype="https://schema.org/Answer">
                    <div class="card-body" itemprop="text">
                        {{item.answer}}
                    </div>
                </div>
            </transition>
        </div>
    </div>

</template>

<script>
    export default {
        name: "AccordionItemComponent",


        props: {
            item: Object,
        },

        data(){
            return {
                isShow: false
            }
        }
    }
</script>
