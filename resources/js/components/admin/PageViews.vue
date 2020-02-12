<template>
    <div>
        <b-table :items="pageViews" :fields="fields">
            <template v-slot:cell(user)="data">
                {{data.item.user.data.first_name}} {{data.item.user.data.last_name}}
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "PageViews",
        
        data() {
            return {
                pageViews: [],
                fields: [
                    {key: 'user', text: 'User'},
                    {key: 'created_at', text: 'Viewed At'},
                    {key: 'activity_instance.name', text: 'Activity Instance Name'},
                ]
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
        }
    }
</script>

<style scoped>

</style>