<template>
    <div style="width: 100%">
        <div style="text-align: right;">
            <b-button v-b-toggle.html-editor variant="info"><i class="fa fa-edit"/> Edit</b-button>
            <b-button v-b-toggle.preview variant="info"><i class="fa fa-show"/> Preview</b-button>
        </div>
        <b-collapse id="html-editor">
            <editor :disabled="disabled"
                    :init="config"
                    api-key="no-api-key"
                    v-model="value"
            ></editor>
        </b-collapse>
        <b-collapse id="preview">
            <div style="border: 1px solid black;">
                <span v-html="value"></span>
            </div>
        </b-collapse>
    </div>
</template>

<script>
    import Editor from '@tinymce/tinymce-vue'
    import {abstractField} from "vue-form-generator";

    export default {
        name: 'StaticPageHtml',

        mixins: [abstractField],

        components: {
            'editor': Editor
        },

        data() {
            return {
                width: 700,
                height: 600,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat fullscreen'
            }
        },

        computed: {
            config() {
                return {
                    menubar: this.menubar,
                    plugins: this.plugins,
                    toolbar: this.toolbar,
                    width: this.width
                }
            }
        }
    }
</script>
