<script setup>
import {Head, router} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ArrowRight, ArrowDown, Filter, Search} from "@element-plus/icons-vue";
import Pagination from "@/Components/Pagination.vue";
import {ref, watch} from 'vue'
import _debounce from 'lodash.debounce'

const props = defineProps({
    users: {
        type: Object
    },
    query: {
        type: Object
    }
})

const value2 = ref('')

const shortcuts = [
    {
        text: 'Last week',
        value: () => {
            const end = new Date()
            const start = new Date()
            start.setDate(start.getDate() - 7)
            return [start, end]
        },
    },
    {
        text: 'Last month',
        value: () => {
            const end = new Date()
            const start = new Date()
            start.setMonth(start.getMonth() - 1)
            return [start, end]
        },
    },
    {
        text: 'Last 3 months',
        value: () => {
            const end = new Date()
            const start = new Date()
            start.setMonth(start.getMonth() - 3)
            return [start, end]
        },
    },
]

const handleSelectionChange = () => {

}

const search = ref(props.query.search ?? '');

// watch with debounce
watch(search, _debounce((value) => {
    router.visit(route('users.index', {search: value}), {
        preserveScroll: true,
    });
}, 500))

const sortChange = ({prop, order}) => {
    console.log(prop, order)
}

</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <div class="flex items-center justify-between">
            <el-breadcrumb :separator-icon="ArrowRight">
                <el-breadcrumb-item :to="{ path: '/' }">Dashboard</el-breadcrumb-item>
                <el-breadcrumb-item>Users</el-breadcrumb-item>
            </el-breadcrumb>
            <div class="flex items-center space-x-3">
                <el-button type="primary">Add New</el-button>
            </div>
        </div>

        <div class="mt-6 space-y-6">
            <div class="flex items-center space-x-2">
                <el-input
                    style="width: 300px"
                    placeholder="Search something ..."
                    :prefix-icon="Search"
                    v-model="search"
                    clearable
                />
                <el-dropdown>
                    <el-button>
                        <el-icon>
                            <Filter/>
                        </el-icon>
                    </el-button>
                    <template #dropdown>
                        <el-dropdown-menu>
                            <el-dropdown-item>Today</el-dropdown-item>
                            <el-dropdown-item>Last 7 days</el-dropdown-item>
                            <el-dropdown-item>Last 6 month</el-dropdown-item>
                            <el-dropdown-item>Last year</el-dropdown-item>
                        </el-dropdown-menu>
                    </template>
                </el-dropdown>
                <el-dropdown>
                    <el-button>
                        Export
                        <el-icon class="el-icon--right">
                            <arrow-down/>
                        </el-icon>
                    </el-button>
                    <template #dropdown>
                        <el-dropdown-menu>
                            <el-dropdown-item>XLSX</el-dropdown-item>
                            <el-dropdown-item>CVS</el-dropdown-item>
                            <el-dropdown-item>XLS</el-dropdown-item>
                            <el-dropdown-item>HTML</el-dropdown-item>
                            <el-dropdown-item>PDF</el-dropdown-item>
                        </el-dropdown-menu>
                    </template>
                </el-dropdown>
                <el-dropdown>
                    <el-button>
                        Bulk Actions
                        <el-icon class="el-icon--right">
                            <arrow-down/>
                        </el-icon>
                    </el-button>
                    <template #dropdown>
                        <el-dropdown-menu>
                            <el-dropdown-item>Delete</el-dropdown-item>
                            <el-dropdown-item>Export XLSX</el-dropdown-item>
                            <el-dropdown-item>Export CVS</el-dropdown-item>
                            <el-dropdown-item>Export XLS</el-dropdown-item>
                            <el-dropdown-item>Export HTML</el-dropdown-item>
                            <el-dropdown-item>Export PDF</el-dropdown-item>
                        </el-dropdown-menu>
                    </template>
                </el-dropdown>
            </div>

            <div>
                <el-table
                    ref="multipleTableRef"
                    :data="users.data"
                    style="width: 100%"
                    @selection-change="handleSelectionChange"
                    @sort-change="sortChange"
                >
                    <el-table-column type="selection" width="55"/>
                    <el-table-column label="Name" width="400">
                        <template #default="scope">{{ scope.row.name }}</template>
                    </el-table-column>
                    <el-table-column sortable="custom" property="email" label="Email" width="300"/>
                    <el-table-column align="right">
                        <template #header>
                            Actions
                        </template>
                        <template #default="scope">
                            <el-button size="small"
                            >Edit
                            </el-button
                            >
                            <el-button
                                size="small"
                                type="danger"
                            >Delete
                            </el-button
                            >
                        </template>
                    </el-table-column>

                </el-table>
            </div>


            <div class="mt-6">
                <Pagination :pagination="users.links"/>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
