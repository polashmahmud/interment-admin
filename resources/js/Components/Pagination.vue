<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    pagination: Object
})
</script>

<template>
    <nav aria-label="Page navigation example">
        <ul class="flex items-center h-8 -space-x-px text-sm">
            <li
                v-for="link in pagination"
                :key="link.label"
            >
                <Link
                    v-html="link.label"
                    :href="link.url ?? ''"
                    class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 transition bg-white border border-gray-300 hover:bg-gray-100 hover:text-slate-300 dark:bg-slate-900 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800 dark:hover:text-white"
                    :class="{'bg-slate-700' : link.active, 'opacity-50': !link.url}"
                />
            </li>
        </ul>
    </nav>
</template>
