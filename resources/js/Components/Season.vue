<template>
    <div>
        <div class="p-6 sm:px-20 border-b border-gray-200 text-right">
            <div class="mt-8 text-2xl" style="height:100px;">
                {{season.name}}
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-40 flex flex-row">
            <div class="p-6 basis-3/4">
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                    <span>Episodes</span>
                </div>

                <div class="mt-5">
                    <table class="episodes">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="episode in season.episodes" :key="'episode-'+episode.id">
                                <td>{{episode.number}}</td>
                                <td>{{episode.description}}</td>
                                <td>
                                    <Link :href="route('watch/play',{episode: episode.id, stage: 1})">Play</Link>
                                </td>
                                <td>
                                    <Link :href="route('watch/summary',{episode: episode.id})">Summary</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

            <div class="p-6 basis-1/4">
                <div class="text-center text-lg text-gray-600 leading-7 font-semibold">
                    The Cast
                </div>

                <div class="mt-6 columns-2">
                    <div v-for="queen in queens" :key="queen.id" class="text-center">
                        <queen-photo :queen="queen.queen" /> {{queen.queen.name}}
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<style scoped>
    .episodes th, .episodes td {
        padding: 20px;
        border: 1px solid #666;
    }
</style>

<script>
import QueenPhoto from './QueenPhoto.vue';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link,
        QueenPhoto
    },
    props: {
        season: Object,
        queens: Array,
    }
}
</script>
