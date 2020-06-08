<template>
    <b-button @click="submit" variant="primary" :disabled="clicked || loading">
        <span v-if="clicked">Submitted</span>
        <span v-else><slot></slot></span>
    </b-button>

</template>

<script>
    export default {
        name: "SubmitButton",
        data() {
            return {
                clicked: false,
                loading: false
            }
        },
        created() {
            this.checkedClicked();
        },
        methods: {
            checkedClicked() {
                this.loading = true;

                this.$http.get('/click')
                    .then(response => {
                        if(response.data.length > 0) {
                            this.clicked = true;
                        } else {
                            this.clicked = false;
                        }
                    })
                    .catch(error => {
                        this.$notify.alert('Could not load results: ' + error.response.data.message)
                    })
                    .then(() => this.loading = false);
            },
            submit() {
                this.loading = true;
                this.$http.post('/click')
                    .then(response => this.clicked = true)
                    .catch(error => this.$notify.alert('Could not submit: ' + error.response.data.message))
                    .then(() => this.loading = false);
            }
        }
    }
</script>

<style scoped>

</style>