<template>
    <button class="btn" @click="emitValidate">
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
            required: true
        },
        icon: {
            type: String,
            required: false
        }
    },

    methods: {
        emitValidate() {
            this.$emit('validate');
        }
    }
}
</script>
