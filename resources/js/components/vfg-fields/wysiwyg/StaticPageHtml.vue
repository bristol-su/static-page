<template>
    <div style="width: 100%">
        <div style="text-align: right;">
            <b-button variant="info" v-b-modal.show-html-editor><i class="fa fa-edit" /> Edit</b-button>
        </div>
        <span v-html="value"></span>
        
        <b-modal id="show-html-editor" size="xl" title="Edit HTML">
            <editor :init="config"
                    api-key="no-api-key"
                    v-model="value"
                    :disabled="disabled"
            ></editor>
        </b-modal>
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
