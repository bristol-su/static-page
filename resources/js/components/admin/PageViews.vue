<template>
    <div>
        <p-table :items="presentedPageViews" :columns="fields">
        </p-table>
    </div>
</template>

<script>
    export default {
        name: "PageViews",

        data() {
            return {
                pageViews: [],
                fields: ['User', 'Viewed At', 'Activity Instance Name']
            }
        },

        mounted() {
            this.loadPageViews();
        },

        methods: {
            loadPageViews() {
                this.$http.get('/page-view')
                    .then(response => this.pageViews = response.data)
                    .catch(error => this.$notify.alert('Could not load the page views'));
            }
        },
        computed: {
            presentedPageViews() {
                return this.pageViews.map(p => {
                    return {
                        'User': p.user.data.first_name + ' ' + p.user.data.last_name,
                        'Viewed At': p.created_at,
                        'Activity Instance Name': p.activity_instance.name
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
