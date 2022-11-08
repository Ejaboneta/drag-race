<template>
    <div class="mb-4 p-4 text-section text-center" >
        <div v-if="text.queens">
            <queen-photo v-for="queen in text.queens" :key="'queen-'+queen.id" :queen="queen" />
        </div>
        {{text.text}}
    </div>
</template>

<style scoped>
    .text-section {
        border: 1px solid #999;
    }
</style>

<script>
import QueenPhoto from '@/components/QueenPhoto.vue';
    export default {
        components: {
            QueenPhoto
        },
        props: {
            text: Object
        }
    }
</script>
