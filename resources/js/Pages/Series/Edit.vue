<template>
    <AppLayout title="Series">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Update Series
                </h2>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form :action="'/series/'+series.id+'/update'" method="post">
                         <input type="hidden" name="_token" :value="token" />
                        <table>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" :value="series.name" /></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Save Series"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
    tr {
        padding: 20px 0;
    }

    th {
        text-align:left;
        vertical-align: top;
    }
    label {
        margin: 0 10px;
    }
</style>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


export default {
    components: {
        AppLayout,
        PrimaryButton,
    },
    props: {
        series: Object,
        attributes: Array,
        token: String
    },
    data() {
        return {
            series_headers: [
                {
                    display: 'Name',
                    key: 'name'
                }
            ],
            rows: [
                { name: 'Alaska'},
                { name: 'Detox'},
                { name: 'Pandora Box'},
            ],
        };
    }
}
</script>
