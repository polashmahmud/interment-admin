<script setup>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ArrowRight} from "@element-plus/icons-vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <el-breadcrumb :separator-icon="ArrowRight">
            <el-breadcrumb-item :to="{ path: '/' }">Dashboard</el-breadcrumb-item>
            <el-breadcrumb-item>Users</el-breadcrumb-item>
        </el-breadcrumb>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
