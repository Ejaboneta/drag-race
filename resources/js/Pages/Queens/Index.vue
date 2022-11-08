<template>
    <AppLayout title="Series">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Queens
                </h2>
                <div class="text-right">
                    <Link href="/queens/create">
                        <PrimaryButton color="green">
                            + Add Queen
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <TableComponent :headers="queen_headers" :rows="queens" :actions="actions" object="queen"/>
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
        queens: Array,
    },
    data() {
        return {
            queen_headers: [
                {
                    display: 'Name',
                    key: 'name'
                }
            ],
            actions: [
                {
                    display: 'Edit',
                    route: 'queens/edit'
                },
                {
                    display: 'Delete',
                    route: 'queens/delete'
                },
            ]
        };
    }
}
</script>
