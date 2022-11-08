<template>
    <AppLayout title="Watch">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="background: #72d8b0;background-image: url('/images/bg.png');background-repeat:no-repeat; background-size:contain;">
                    <Season :season="season" :queens="queens"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script >

import AppLayout from '@/Layouts/AppLayout.vue';
import Season from '@/Components/Season.vue';
export default {
    components: {
        AppLayout,
        Season
    },
    props: {
        season: Object,
        queens: Array,
    }
}
</script>
