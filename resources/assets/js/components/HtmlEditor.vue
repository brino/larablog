<template>
    <textarea :id="id" :name="name" class="textarea">{{this.value}}</textarea>
</template>
<style>

</style>
<script>
import * as CodeMirror from 'codemirror';
require('codemirror/mode/htmlmixed/htmlmixed');

    export default{
        props: {
            name: {
                type: String,
                required: true
            },
            value: {
                type: String,
                required: true
            }

        },
        data() {
            return{
                id:'html-editor-'+this.name,
            }
        },
        mounted() {
            CodeMirror.fromTextArea(
                document.getElementById(this.id),
                {mode: 'htmlmixed',lineNumbers: true}
            );
        },
    }
</script>
