<script setup>
import {Head, router} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ArrowRight, ArrowDown, Filter, Search} from "@element-plus/icons-vue";
import Pagination from "@/Components/Pagination.vue";
import { ref, watch } from 'vue'
import _debounce from 'lodash.debounce'
import Table from "@/Components/Interment/Table/Table.vue";

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

const sortChange = ({ prop, order }) => {
    let sort = order === 'ascending' ? prop : `-${prop}`
    router.visit(route('users.index', {sort: sort}), {
        preserveScroll: true,
    });
}

</script>

<template>
    <Head title="Dashboard" />

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
                <div style="width: 400px">
                    <el-date-picker
                        v-model="value2"
                        type="datetimerange"
                        :shortcuts="shortcuts"
                        range-separator="To"
                        start-placeholder="Start date"
                        end-placeholder="End date"
                    />
                </div>
                <el-dropdown>
                    <el-button>
                        <el-icon><Filter /></el-icon>
                    </el-button>
                    <template #dropdown>
                        <el-dropdown-menu>
                            <el-dropdown-item>Action 1</el-dropdown-item>
                            <el-dropdown-item>Action 2</el-dropdown-item>
                            <el-dropdown-item>Action 3</el-dropdown-item>
                            <el-dropdown-item>Action 4</el-dropdown-item>
                            <el-dropdown-item>Action 5</el-dropdown-item>
                        </el-dropdown-menu>
                    </template>
                </el-dropdown>
                <el-dropdown>
                    <el-button>
                        Export<el-icon class="el-icon--right"><arrow-down /></el-icon>
                    </el-button>
                    <template #dropdown>
                        <el-dropdown-menu>
                            <el-dropdown-item>Action 1</el-dropdown-item>
                            <el-dropdown-item>Action 2</el-dropdown-item>
                            <el-dropdown-item>Action 3</el-dropdown-item>
                            <el-dropdown-item>Action 4</el-dropdown-item>
                            <el-dropdown-item>Action 5</el-dropdown-item>
                        </el-dropdown-menu>
                    </template>
                </el-dropdown>
                <el-dropdown>
                    <el-button>
                        Bulk Actions<el-icon class="el-icon--right"><arrow-down /></el-icon>
                    </el-button>
                    <template #dropdown>
                        <el-dropdown-menu>
                            <el-dropdown-item>Action 1</el-dropdown-item>
                            <el-dropdown-item>Action 2</el-dropdown-item>
                            <el-dropdown-item>Action 3</el-dropdown-item>
                            <el-dropdown-item>Action 4</el-dropdown-item>
                            <el-dropdown-item>Action 5</el-dropdown-item>
                        </el-dropdown-menu>
                    </template>
                </el-dropdown>
            </div>

            <Table></Table>

            <div class="mt-6">
                <Pagination :pagination="users.links" />
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
