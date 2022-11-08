<template>
    <AppLayout title="Series">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Update Queen
                </h2>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form :action="'/queens/'+queen.id+'/update'" method="post">
                         <input type="hidden" name="_token" :value="token" />
                        <table>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" :value="queen.name" /></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><input type="text" name="image_url" :value="queen.image_url"/></td>
                            </tr>
                            <tr>
                                <th>Stats</th>
                                <td>
                                    <div v-for="skill in skills" :key="'skill-'+skill.id">
                                        <input readonly disabled style="margin-right:10px;width:20px;" v-if="queen.skills[skill.id]" :value="queen.skills[skill.id]['value']"/>
                                        <input readonly disabled style="margin-right:10px;width:20px;" v-else value="0"/>
                                        <label>{{skill.name}}</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Save Queen"/>
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
        queen: Object,
        skills: Array,
        token: String
    },
    data() {
        return {
            queen_headers: [
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
