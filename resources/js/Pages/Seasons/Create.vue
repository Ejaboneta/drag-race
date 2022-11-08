<template>
    <AppLayout title="Season">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create a Season
                </h2>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="/seasons/store" method="post">
                         <input type="hidden" name="_token" :value="token" />
                        <table>
                            <tr>
                                <th>Series</th>
                                <td>
                                    <select name="series_id" v-model="selected">
                                        <option v-for="item in series" :key="'series-'+item.id" :value="item">{{item.name}}</option>
                                    </select>
                                    <input type="hidden"  name="series_id" :value="selected.id" />
                                </td>
                            </tr>
                            <tr>
                                <th>Season</th>
                                <td>
                                    <div v-if="selected">
                                        <input type="readonly" name="season_number" :value="season_number" /></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Save Season"/>
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
        series: Array,
        token: String
    },
    data() {
        return {
            selected: Object
        };
    },
    computed: {
        season_number() {
            if(this.selected == null) {
                return ''
            } else {
                return this.selected.seasons_count + 1
            }
        }
    }
}
</script>
