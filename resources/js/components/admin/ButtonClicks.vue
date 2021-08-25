<template>
    <div>
        <p-table :items="presentedButtonClicks" :columns="fields">
        </p-table>
    </div>
</template>

<script>
    export default {
        name: "ButtonClicks",

        data() {
            return {
                buttonClicks: [],
                fields: ['User', 'Viewed At', 'Activity Instance Name']
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
        },
        computed: {
            presentedButtonClicks() {
                return this.buttonClicks.map(b => {
                    return {
                        'User': b.user.data.first_name + ' ' + b.user.data.last_name,
                        'Viewed At': b.created_at,
                        'Activity Instance Name': b.activity_instance.name
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
