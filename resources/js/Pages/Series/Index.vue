<template>
    <AppLayout title="Series">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Series
                </h2>
                <div class="text-right">
                    <Link href="/series/create">
                        <PrimaryButton color="green">
                            + Add Series
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <TableComponent :headers="series_headers" :rows="series" :actions="actions" object="series"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TableComponent from '@/Components/TableComponent.vue';
import { Link } from '@inertiajs/inertia-vue3';


export default {
    components: {
        AppLayout,
        PrimaryButton,
        TableComponent,
        Link
    },
    props: {
        series: Array,
    },
    data() {
        return {
            series_headers: [
                {
                    display: 'Name',
                    key: 'name'
                }
            ],
            actions: [
                {
                    display: 'Edit',
                    route: 'series/edit'
                },
                {
                    display: 'Delete',
                    route: 'series/delete'
                },
            ]
        };
    }
}
</script>
