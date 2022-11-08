<template>
    <AppLayout title="Series">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create a Series
                </h2>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="/series/store" method="post">
                         <input type="hidden" name="_token" :value="token" />
                        <table>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" /></td>
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
        attributes: Array,
        token: String
    },
    data() {
        return {
        };
    }
}
</script>
