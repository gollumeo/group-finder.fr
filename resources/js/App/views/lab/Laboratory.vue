<template>
    <div class="p-4 border border-indigo-100 h-full flex gap-2 items-center">
        <ValidateButton />
        <ValidateButton innerText="Disabled" @validate="console.log('coucou')" disabled size="sm"/>
        <CancelButton @cancel="console.log('coucou')" />
        <CancelButton disabled size="sm"/>
        <SaveButton />
        <SaveButton disabled size="sm" />
    </div>
</template>

<script>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import ValidateButton from "@partials/ValidateButton.vue";
import CancelButton from "@partials/CancelButton.vue";
import SaveButton from "@partials/SaveButton.vue";

export default {
    name: "Laboratory",
    components: {SaveButton, CancelButton, ValidateButton, FontAwesomeIcon}
}
</script>
