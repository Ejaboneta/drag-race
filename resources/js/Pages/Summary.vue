<template>
    <AppLayout title="Watch">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Watch
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="background: #72d8b0;background-image: url('/images/bg.png');background-repeat:no-repeat; background-size:contain;">

                    <div class="p-6 sm:px-20 border-b border-gray-200 text-right">
                        <div class="mt-8 text-2xl" style="height:100px;">
                            {{season.name}}, Episode {{episode.number}}<br>
                            Episode Summary
                        </div>
                    </div>

                    <div>
                        <table class="ranking">
                            <thead>
                                <tr>
                                    <th>Contestant</th>
                                    <th v-for="episode in ranking.episodes" :key="'episode'+episode.id">Episode {{episode.number}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="queen in ranking.queens" :key="'queen'+queen.id">
                                    <td>{{queen.name}} {{queen.id}} </td>
                                    <td v-for="episode in ranking.episodes" :key="'episode'+episode.id" style="padding:0">
                                        <div style="margin:0;padding:10px;height:100%" v-if="episode.queens[queen.id]" :class="episode.queens[queen.id].standing">{{episode.queens[queen.id].standing}}</div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                    <div class="bg-gray-200 bg-opacity-40 p-8">
                        <div v-for="item in summary" :key="'summary-'+item.title">
                            <h2>{{item.title}}</h2>
                            <ObjectText v-for="text in item.texts" :key="'text-'+text.id" :text="text"></ObjectText>
                        </div>


                        <div>
                            <!-- <div v-if="stage.order > 1">Previous</div> -->
                            <div><Link :href="route('watch')">Finish</Link></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
    .ranking th, .ranking td {
        border: 1px solid #999;
        padding: 10px;
    }

    .Winner {
        background: green;
    }
    .Top {
        background: yellow;
    }
    .Safe {
        background: orange;
    }
    .Bottom {
        background: red;
    }
    .Eliminated {
        background: gray;
    }
</style>

<script >
import AppLayout from '@/Layouts/AppLayout.vue';
import Season from '@/Components/Season.vue';
import ObjectText from '@/Components/ObjectText.vue';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        AppLayout,
        ObjectText,
        Season,
        Link
    },
    props: {
        season: Object,
        episode: Object,
        stage: Object,
        summary: Array,
        ranking: Array
    }
}
</script>
