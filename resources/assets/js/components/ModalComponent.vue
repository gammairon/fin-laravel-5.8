<template>
    <transition name="ModalComponent">
        <div class="g-modal-mask">
            <div class="g-modal-wrapper">
                <div class="g-modal-container">

                    <div class="g-modal-header">
                        <slot name="header">

                        </slot>
                    </div>

                    <div class="g-modal-body">
                        <slot name="body">

                        </slot>
                    </div>

                    <div class="g-modal-footer">
                        <slot name="footer">
                            <button class="modal-default-button green-btn" @click="$emit('close')">
                                OK
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "ModalComponent"
    }
</script>
