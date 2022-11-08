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
                            {{stage.order}} / 8
                        </div>
                    </div>

                    <div class="bg-gray-200 bg-opacity-40 p-8">
                        <div class="ml-4 text-xl text-gray-600 leading-7 font-semibold h3 text-center">{{stage.name}}</div>
                        <div v-if="stage.image">
                            <img :src="'/images/'+stage.image" style="width:100%" />
                        </div>

                        <div v-for="(part,index) in texts" :key="'text-'+index">
                            <div class="m-10 text-lg text-gray-600 font-semibold">{{part.name}}</div>
                            <ObjectText v-for="text in part.items" :key="'text-'+text.id" :text="text"></ObjectText>
                            <hr />
                        </div>

                        <div>
                            <!-- <div v-if="stage.order > 1">Previous</div> -->
                            <div v-if="stage.order < 8"><Link :href="route('watch/play',{episode:episode.id,stage: (stage.order + 1)})">Next</Link></div>
                            <div v-else><Link :href="route('watch/summary',{episode:episode.id, stage: (stage.order + 1)})">View Results</Link></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

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
        texts: Array,
    }
}
</script>
