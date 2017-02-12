<template>
    <label :for="name" class="myFile">
        <input class="input" type="text" :value="fileName" placeholder="Choose File to Upload">
        <span class="icon is-small">
            <i class="fa fa-upload"></i>
        </span>
        <input @change="updateFile(name)" type="file" :name="name" :id="name">
    </label>
</template>
<style>
    .myFile {
        position: relative;
        overflow: hidden;
    }
    .myFile input[type="file"] {
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        cursor: pointer;
        padding: 10px;
        width: 100%;
    }
</style>
<script>
    export default{
        props: {
            name: {
                type: String,
                default: 'file',
            },
            value: String,
        },
        data(){
            return{
                fileName:''
            }
        },
        methods:{
            updateFile(input){
                //console.log($('#'+input)[0].files[0].name);
                //console.log($('#'+input)[0]);
                if($('#'+input)[0] != undefined) {
                    this.fileName = $('#'+input)[0].files[0].name;
                }

            }
        },
        mounted() {
            if(this.value != '') {
                this.updateFile(this.value);
            }
        }
    }
</script>
