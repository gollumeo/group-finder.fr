<template>
    <button :class="buttonClass" @click="emitValidate">
        {{ innerText }}
        <font-awesome-icon v-if="icon" :icon="icon" />
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
            required: false
        },
        size: {
            type: String,
            validator(value) {
                return ['sm', 'base'].includes(value)
            },
            default: 'base'
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
