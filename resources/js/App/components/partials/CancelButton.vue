<template>
    <button :class="buttonClass" @click="emitCancel" :disabled="disabled">
        <font-awesome-icon v-if="hasIcon" :icon="icon" />
        {{ innerText }}
    </button>
</template>

<script>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

export default {
    name: "CancelButton",
    components: {FontAwesomeIcon},
    emits: ['cancel'],

    props: {
        innerText: {
            type: String,
            default: 'Annuler'
        },
        hasIcon: {
            type: Boolean,
            default: true
        },
        icon: {
            type: String,
            default: 'fa-solid fa-check'
        },
        size: {
            type: String,
            validator(value) {
                return ['sm', 'base'].includes(value)
            },
            default: 'base'
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        buttonClass() {
            return {
                'btn btn-red btn-sm': this.size === 'sm',
                'btn btn-red': this.size === 'base'
            }
        }
    },

    methods: {
        emitCancel() {
            this.$emit('cancel');
        }
    }
}
</script>
