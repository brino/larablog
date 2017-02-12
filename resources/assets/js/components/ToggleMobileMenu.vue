<template>

</template>
<style>
    body{
        background-color:#ff0000;
    }
</style>
<script>
    export default {
    data: {
        isActive: false
    },
    methods: {
        toggle () {
            return this.isActive = !this.isActive;
        }
    }
}
</script>
