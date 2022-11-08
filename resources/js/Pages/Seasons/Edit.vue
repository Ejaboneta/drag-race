<template>
    <AppLayout title="Seasons">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Update Season
                </h2>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form :action="'/seasons/'+season.id+'/update'" method="post">
                         <input type="hidden" name="_token" :value="token" />
                        <table>
                            <tr>
                                <th width="200">Name</th>
                                <td><input type="text" name="name" :value="season.name" /></td>
                            </tr>
                            <tr>
                                <th>Queens</th>
                                <td>
                                    <table>
                                        <tr>
                                            <th colspan="2">Queen</th>
                                            <th>Status</th>
                                        </tr>
                                        <tr v-for="q in season.queens" :key="'queen-'+q.id">
                                            <td width="100"><img class="photo" :src="q.queen.image_url" v-if="q.queen.image_url!=''"/></td>
                                            <td>{{q.queen.name}}</td>
                                            <td></td>
                                        </tr>
                                    </table>

                                    <select v-model="new_queen">
                                        <option v-for="queen in queens" :key="'queen-'+queen.id" :value="queen.id">{{queen.name}}</option>
                                    </select> &nbsp;
                                    <input type="button" value=" + Add Queen" @click="addQueen()"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:right">
                                    <input type="submit" value="Save Season" class="button"/>
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
    table {
        width: 100%
    }
    tr {
        padding: 20px 0;
    }

    th,td {
        padding: 20px;
        text-align:left;
        vertical-align: top;
        border: 1px solid #eee;
    }
    label {
        margin: 0 10px;
    }
    .button {
        border: 1px solid black;
        background: green;
        color: white;
        padding: 10px;
    }
    .photo {
        max-width: 100px;
        max-height: 100px;
    }
</style>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        AppLayout,
        PrimaryButton,
    },
    props: {
        season: Object,
        queens: Array,
        attributes: Array,
        token: String
    },
    data() {
        return {
            new_queen: 0,
            seasons_headers: [
                {
                    display: 'Name',
                    key: 'name'
                }
            ],
        };
    },
    methods: {
        addQueen() {
            axios.post('/seasons/'+this.season.id+'/addQueen', {
                queen_id: this.new_queen,
                _token: this.$page.props.csrf_token,
            }).then((result)=>{
                Inertia.reload()
            })
        }
    }
}
</script>
