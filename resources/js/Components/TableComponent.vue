<template>
    <table>
        <thead>
            <tr>
                <th v-for="(header,index) in headers" :key="'header-'+index">
                    {{header.display}}
                </th>
                <th v-for="(action,index) in actions" :key="'action-'+index" style="max-width: 100px;"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(row,row_index) in rows" :key="'row-'+row_index" :class="{'odd': Number.isInteger(row_index/2)}">
                <td v-for="(header,index) in headers" :key="'header-'+index">
                    {{row[header.key]}}
                </td>
                <td v-for="(action,index) in actions" :key="'action-'+index" style="max-width: 100px;">
                    <div v-if="action.if">
                        <div v-if="row[action.if[0]] == action.if[1]">
                            <NavLink :href="route(action.route,{[object]: row.id})">
                                {{action.display}}
                            </NavLink>
                        </div>
                    </div>
                    <div v-else>
                        <NavLink :href="route(action.route,{[object]: row.id})">
                            {{action.display}}
                        </NavLink>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>
</template>

<script>
import NavLink from '@/Components/NavLink.vue';
export default {
    components: {
        NavLink
    },
    props: {
      headers: Array,
      rows: Array,
      actions: Array,
      object: String
    },
  }
</script>

<style scoped>
    table {
        width: 100%;
    }
    th, td {
        text-align: left;
        padding: 5px 10px;
    }
    .odd {
        background: #eee;
    }

</style>
