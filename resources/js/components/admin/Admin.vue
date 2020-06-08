<template>
    <b-tabs>
        <b-tab title="Button Clicks" active>
            <button-clicks></button-clicks>
        </b-tab>
        <b-tab title="Page Views">
            <page-views></page-views>
        </b-tab>
    </b-tabs>
</template>

<script>
    import PageViews from './PageViews';
    import ButtonClicks from './ButtonClicks';
    export default {
        name: "Admin",
        components: {ButtonClicks, PageViews}
    }
</script>

<style scoped>

</style>