<template>
    <div class="w-full p-3">
        <span class="p-5" v-html="html"></span>
        <div v-if="canClickButton">
            <submit-button :can-unsubmit="canUnsubmit">{{buttonText}}</submit-button>
        </div>
    </div>
</template>

<script>
import SubmitButton from './SubmitButton';
export default {
    name: "ShowHtml",
    components: {SubmitButton},
    props: {
        html: {
            required: true,
            type: String
        },
        buttonText: {
            required: true,
            type: String,
        },
        canClickButton: {
            required: true,
            type: Boolean
        },
        canUnsubmit: {
            required: true,
            type: Boolean
        }
    },
}
</script>

<style scoped>

</style>
