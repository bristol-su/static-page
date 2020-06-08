<template>
    <div>
        <b-table :items="buttonClicks" :fields="fields">
            <template v-slot:cell(user)="data">
                {{data.item.user.data.first_name}} {{data.item.user.data.last_name}}
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "ButtonClicks",

        data() {
            return {
                buttonClicks: [],
                fields: [
                    {key: 'user', text: 'User'},
                    {key: 'created_at', text: 'Viewed At'},
                    {key: 'activity_instance.name', text: 'Activity Instance Name'},
                ]
            }
        },

        mounted() {
            this.loadButtonClicks();
        },

        methods: {
            loadButtonClicks() {
                this.$http.get('/click')
                    .then(response => this.buttonClicks = response.data)
                    .catch(error => this.$notify.alert('Could not load the button clicks'));
            }
        }
    }
</script>

<style scoped>

</style>