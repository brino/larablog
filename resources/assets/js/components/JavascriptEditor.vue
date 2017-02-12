<template>
    <textarea :id="id" :name="name" class="textarea"></textarea>
</template>
<style>

</style>
<script>
import * as CodeMirror from 'codemirror';
require('codemirror/mode/javascript/javascript');
require('codemirror/addon/mode/overlay');
require('codemirror/addon/edit/matchbrackets');

    export default{
        props: {
            name: {
                type: String,
                required: true
            },

        },
        data() {
            return{
                id:'js-editor-'+this.name,
            }
        },
        mounted() {
            CodeMirror.fromTextArea(
                document.getElementById(this.id),
                {mode: 'javascript',lineNumbers: true,matchBrackets:true,viewportMargin:Infinity}
            );
        },
    }
</script>
