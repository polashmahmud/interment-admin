<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <el-form
            label-position="top"
            size="large"
            @submit.prevent="submit"
        >
            <el-form-item label="Email" :error="form.errors.email">
                <el-input v-model="form.email" />
            </el-form-item>

            <el-form-item label="Password" :error="form.errors.password">
                <el-input type="password" v-model="form.password" />
            </el-form-item>

            <el-checkbox v-model="form.remember" label="Remember me" size="large" />

            <div class="flex justify-end items-center space-x-3">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>
                <el-button
                    type="primary"
                    @click="submit"
                    :loading="form.processing"
                    :disabled="form.processing"
                >
                    Log in
                </el-button>
            </div>
        </el-form>
    </GuestLayout>
</template>
