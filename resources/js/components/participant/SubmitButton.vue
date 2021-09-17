<template>
    <p-button
        v-if="!$isLoading('checking-button-state')"
        @click="handleClick"
        :variant="(clicked ? 'success' : 'primary')"
        :disabled="!canUnsubmit && clicked"
        :busy="$isLoading('submit-button') || $isLoading('unsubmit-button')"
        :busy-text="$isLoading('submit-button') ? 'Submitting' : 'Unsubmitting'">
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

            this.$http.get('/click', {name: 'checking-button-state'})
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
                this.$http.delete('/click/' + this.click.id, {name: 'unsubmit-button'})
                    .then(response => {
                        this.clicked = false;
                        this.click = null;
                    })
                    .catch(error => this.$notify.alert('Could not remove button: ' + error.response.data.message))
            }
        },
        submit() {
            this.$http.post('/click', {}, {name: 'submit-button'})
                .then(response => {
                    this.clicked = true;
                    this.click = response.data;
                })
                .catch(error => this.$notify.alert('Could not submit: ' + error.response.data.message))
        }
    }
}
</script>

<style scoped>

</style>
