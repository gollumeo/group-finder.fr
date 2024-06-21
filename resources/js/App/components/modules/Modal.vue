<template>
    <div :id="id" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full bg-black/80">
        <slot name="wrapper">
            <div class="relative p-4 w-full flex items-center justify-center"
                 :class="(sizeValue[size] ?? sizeValue['2xl']) + ' ' + (fullHeight || scrollable ? 'h-full' : 'max-h-full')">
                <!-- Modal content -->
                <div class="relative bg-indigo-100 rounded-lg shadow dark:bg-slate-700 flex flex-col w-full"
                     :class="fullHeight ? 'h-full' : 'max-h-full'">
                    <!-- Modal header -->
                    <slot name="header">
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-slate-600">
                            <slot name="title">
                                <h3 class="text-xl font-semibold text-indigo-800 dark:text-white">
                                    {{ title }}
                                </h3>
                            </slot>
                            <button type="button" @click="show = false; $emit('close')"
                                    class="bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white text-slate-400">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                    </slot>
                    <!-- Modal body -->
                    <div class="space-y-4 min-h-32"
                         :class="`${fullHeight ? 'flex-1' : ''} ${scrollable ? 'overflow-y-auto' : ''} ${paddingBody}`">
                        <slot></slot>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex justify-end items-center p-4 md:p-5 border-t border-slate-200 rounded-b dark:border-slate-600 gap-2">
                        <slot name="footer">
                            <button type="button" :disabled="disabledValidate" @click="$emit('validate')"
                                    v-if="!closeOnly" class="btn btn-blue">{{
                                    titleValidate }}</button>
                            <ValidateButton @click="show = false; $emit('close')" />
                        </slot>
                    </div>
                    <slot name="loading"></slot>
                </div>
            </div>
        </slot>
    </div>
</template>

<script>
import { Modal } from 'flowbite'
import ValidateButton from "@partials/ValidateButton.vue";

export default {
    name: 'Modal',
    components: {ValidateButton},
    props: {
        modelValue: {
            type: Boolean,
            default: false,
        },
        // static or dynamic
        dynamic: {
            type: Boolean,
            default: true,
        },
        closable: {
            type: Boolean,
            default: true,
        },
        title: {
            type: String,
            default: 'Mon titre',
        },
        titleClose: {
            type: String,
            default: 'Fermer',
        },
        titleValidate: {
            type: String,
            default: 'Valider',
        },
        size: {
            //sm, md, lg, xl
            type: String,
            default: '2xl',
        },
        fullHeight: {
            type: Boolean,
            default: false,
        },
        closeOnly: {
            type: Boolean,
            default: false,
        },
        scrollable: {
            type: Boolean,
            default: false,
        },
        paddingBody:{
            type: String,
            default: 'p-4 md:p-5'
        },
        disabledValidate: {
            type: Boolean,
            default: false,
        },

    },
    emits: ['update:modelValue', 'validate', 'close'],
    data() {
        return {
            id: 'modal-' + Math.random().toString(36).substring(7),
            modal: null,
            show: this.modelValue,
            sizeValue: {
                md: 'max-w-md',
                lg: 'max-w-lg',
                xl: 'max-w-xl',
                '2xl': 'max-w-2xl',
                '3xl': 'max-w-3xl',
                '4xl': 'max-w-4xl',
                '5xl': 'max-w-5xl',
                '6xl': 'max-w-6xl',
                '7xl': 'max-w-7xl',
                full: 'max-w-full',
            },
        }
    },
    mounted() {
        this.modal = new Modal(document.getElementById(this.id), {
            backdrop: this.dynamic ? 'dynamic' : 'static',
            closable: this.closable,
            onHide: () => {
                if (this.show) {
                    this.show = false
                }
            },

        })

        if (this.show) {
            this.modal.show()
        }
    },
    watch: {
        modelValue() {
            this.show = this.modelValue
        },
        show() {
            this.$emit('update:modelValue', this.show)
            if (this.show) {
                this.modal.show()
            } else {
                this.modal.hide()
            }
        }
    },
}
</script>

<style scoped></style>
