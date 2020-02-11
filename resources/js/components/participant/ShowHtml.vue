<template>
    <div>
        <span v-html="html"></span>
    </div>
</template>

<script>
    export default {
        name: "ShowHtml",

        props: {
            html: {
                required: true,
                type: String
            }
        },

        data() {
            return {}
        },

        methods: {},

        computed: {}
    }
</script>

<style scoped>

</style>