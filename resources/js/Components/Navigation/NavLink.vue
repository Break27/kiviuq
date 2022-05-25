<template>
    <Link :class="['inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out', classes]"
          as="button">
        <slot />
    </Link>
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['active']);

const classes = computed(() => props.active
    ? 'border-indigo-400 text-sm text-gray-900 focus:outline-none focus:border-indigo-700'
    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'
);
</script>
