<template>
    <p-button @click="handleClick" :variant="(clicked ? 'success' : 'primary')"  :disabled="loading || (!canUnsubmit && clicked)">
        <span v-if="clicked">Submitted.<span v-if="canUnsubmit"> Click to unsubmit.</span></span>
        <span v-else><slot></slot></span>
    </p-button>

</template>

<script>
export default {
    name: "SubmitButton",
    data() {
        return {
            clicked: false,
            loading: false,
            click: null
        }
    },
    props: {
        canUnsubmit: {
            type: Boolean,
            default: false
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
                    if (response.data.length > 0) {
                        this.clicked = true;
                        this.click = response.data[0];
                    } else {
                        this.clicked = false;
                    }
                })
                .catch(error => {
                    this.$notify.alert('Could not load results: ' + error.response.data.message)
                })
                .then(() => this.loading = false);
        },
        handleClick() {
            if(this.canUnsubmit && this.clicked) {
                this.deleteClicked();
            } else if(!this.clicked) {
                this.submit();
            }
        },
        deleteClicked() {
            if(this.click.id) {
                this.loading = true;
                this.$http.delete('/click/' + this.click.id)
                    .then(response => {
                        this.clicked = false;
                        this.click = null;
                    })
                    .catch(error => this.$notify.alert('Could not remove button: ' + error.response.data.message))
                    .finally(() => this.loading = false);
            }
        },
        submit() {
            this.loading = true;
            this.$http.post('/click')
                .then(response => {
                    this.clicked = true;
                    this.click = response.data;
                })
                .catch(error => this.$notify.alert('Could not submit: ' + error.response.data.message))
                .then(() => this.loading = false);
        }
    }
}
</script>

<style scoped>

</style>
