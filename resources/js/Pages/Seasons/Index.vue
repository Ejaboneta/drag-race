<template>
    <AppLayout title="Seasons">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Seasons
                </h2>
                <div class="text-right">
                    <Link href="/seasons/create">
                        <PrimaryButton color="green">
                            + Add Season
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <TableComponent :headers="season_headers" :rows="seasons" :actions="actions" object="season"/>
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
        seasons: Array,
    },
    data() {
        return {
            season_headers: [
                {
                    display: 'Name',
                    key: 'name'
                }
            ],
            actions: [
                {
                    display: 'Edit',
                    route: 'seasons/edit'
                },
                {
                    display: 'Delete',
                    route: 'seasons/delete'
                },
                {
                    display: 'Start',
                    route: 'seasons/start',
                    if: ['status','new']
                },
                {
                    display: 'Results',
                    route: 'seasons/results',
                    if: ['status','complete']
                }
            ]
        };
    }
}
</script>
