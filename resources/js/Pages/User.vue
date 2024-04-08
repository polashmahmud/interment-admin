<script setup>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ArrowRight, ArrowDown, Filter} from "@element-plus/icons-vue";
import Pagination from "@/Components/Pagination.vue";
import { ref } from 'vue'

defineProps({
    users: {
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


        <div class="mt-6 space-y-3">
            <div class="flex items-center space-x-2">
                <el-input style="width: 300px" placeholder="Search something ..." />
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
            <el-table
                :data="users.data"
                style="width: 100%"
                ref="multipleTableRef"
                @selection-change="handleSelectionChange"
            >
                <el-table-column type="selection" width="55" />
                <el-table-column prop="id" label="Id" sortable/>
                <el-table-column prop="name" label="Name" />
                <el-table-column prop="email" label="Email" />
                <el-table-column align="right">
                    <template #header>
                        Actions
                    </template>
                    <template #default="scope">
                        <el-button size="small" @click="handleEdit(scope.$index, scope.row)"
                        >Edit</el-button
                        >
                        <el-button
                            size="small"
                            type="danger"
                            @click="handleDelete(scope.$index, scope.row)"
                        >Delete</el-button
                        >
                    </template>
                </el-table-column>
            </el-table>


            <div class="mt-6">
                <Pagination :pagination="users.links" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
