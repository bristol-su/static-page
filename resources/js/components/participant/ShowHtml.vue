<template>
    <div>
        <span v-html="html"></span>
        
        <div v-if="canClickButton" style="text-align: right;">
            <submit-button>{{buttonText}}</submit-button>
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
            }
        },
    }
</script>

<style scoped>

</style>