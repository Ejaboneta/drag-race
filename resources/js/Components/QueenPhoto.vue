<template>
    <div class="img_container">
        <img :src="queen.image_url" onerror="this.src='/images/default.png'" />
    </div>
</template>

<style scoped>
    img {
        border-radius: 60px;
        border: 3px solid;
        border-color: black;
        margin: auto;
        width:100px;
        height: 100px;
        background-color: white;
    }
    .img_container {
        padding: 5px;
        margin: auto;
        display: inline-block !important;
    }
</style>

<script>
    export default {
        props: {
            queen: Object,
        },
    }
</script>
