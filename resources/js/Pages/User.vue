<script setup>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ArrowRight} from "@element-plus/icons-vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    users: {
        type: Object
    }
})

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
                <el-input style="width: 300px" placeholder="Search something ..." />
                <el-button type="primary">Add New</el-button>
            </div>

        </div>


        <div class="mt-6">
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
