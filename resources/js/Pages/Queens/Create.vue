<template>
    <AppLayout title="Series">
        <template #header>
            <div class="columns-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create a Queen
                </h2>
            </div>
        </template>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="/queens/store" method="post">
                         <input type="hidden" name="_token" :value="token" />
                        <table>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" /></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><input type="text" name="image_url" /></td>
                            </tr>
                            <tr>
                                <th>Stats</th>
                                <td>
                                    <div v-for="skill in skills" :key="'skill-'+skill.id">
                                        <select :name="'skills['+skill.id+']'">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
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
        skills: Array,
        token: String
    },
    data() {
        return {
        };
    }
}
</script>
