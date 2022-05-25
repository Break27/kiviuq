<template>
    <Link :href="href" :class="['block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out', classes]">
        <slot />
    </Link>
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'border-indigo-400 text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700'
    : 'text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300'
);
</script>
