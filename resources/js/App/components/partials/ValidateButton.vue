<template>
    <button :class="buttonClass" @click="emitValidate" :disabled="disabled">
        <font-awesome-icon v-if="hasIcon" :icon="icon" />
        {{ innerText }}
    </button>
</template>

<script>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

export default {
    name: "ValidateButton",
    components: {FontAwesomeIcon},
    emits: ['validate'],

    props: {
        innerText: {
            type: String,
            default: 'Valider'
        },
        icon: {
            type: String,
            default: 'fa-solid fa-check'
        },
        hasIcon: {
            type: Boolean,
            default: true
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
              'btn btn-sm': this.size === 'sm',
              'btn': this.size === 'base'
          }
      }
    },

    methods: {
        emitValidate() {
            this.$emit('validate');
        }
    }
}
</script>
