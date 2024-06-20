<template>
    <div class="p-4 border border-indigo-100 h-full flex gap-2">
        <ValidateButton />
        <ValidateButton innerText="Disabled" @validate="console.log('coucou')" disabled/>
        <CancelButton @cancel="console.log('coucou')" />
        <CancelButton disabled/>
    </div>
</template>

<script>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import ValidateButton from "@partials/ValidateButton.vue";
import CancelButton from "@partials/CancelButton.vue";

export default {
    name: "Laboratory",
    components: {CancelButton, ValidateButton, FontAwesomeIcon}
}
</script>
