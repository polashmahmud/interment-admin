<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import { ArrowRight, User, Lock, Warning } from '@element-plus/icons-vue'
import { ref } from 'vue'

const activeName = ref('first')

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <el-breadcrumb :separator-icon="ArrowRight">
            <el-breadcrumb-item :to="{ path: '/' }">Dashboard</el-breadcrumb-item>
            <el-breadcrumb-item>Profile</el-breadcrumb-item>
        </el-breadcrumb>

        <el-tabs v-model="activeName" class="demo-tabs mt-6">
            <el-tab-pane name="first">
                <template #label>
                    <span class="custom-tabs-label space-x-2 flex items-center">
                      <el-icon><User /></el-icon>
                      <span>Profile Information</span>
                    </span>
                </template>
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                    class="max-w-xl"
                />
            </el-tab-pane>
            <el-tab-pane name="second">
                <template #label>
                    <span class="custom-tabs-label space-x-2 flex items-center">
                      <el-icon><Lock /></el-icon>
                      <span>Update Password</span>
                    </span>
                </template>
                <UpdatePasswordForm class="max-w-xl" />
            </el-tab-pane>
            <el-tab-pane name="third">
                <template #label>
                    <span class="custom-tabs-label space-x-2 flex items-center">
                      <el-icon><Warning /></el-icon>
                        <span>Delete Account</span>
                    </span>
                </template>
                <DeleteUserForm class="max-w-xl" />
            </el-tab-pane>
        </el-tabs>
    </AuthenticatedLayout>
</template>
