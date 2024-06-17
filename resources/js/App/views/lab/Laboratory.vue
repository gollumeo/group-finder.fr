<template>
    <div class="p-4 border border-indigo-100 h-full flex gap-2">
        <button class="btn"><font-awesome-icon icon="fa-solid fa-file-pdf" />Button test</button>
        <ValidateButton innerText="test" @validate="console.log('coucou')" />
    </div>
</template>

<script>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import ValidateButton from "@partials/ValidateButton.vue";

export default {
    name: "Laboratory",
    components: {ValidateButton, FontAwesomeIcon}
}
</script>
