<template>
    <div class="flex items-center">
        <Link :href="href" class="inline-flex items-center px-1 pt-1 space-x-2" as="button">
            <slot />
            <span>{{ name }}</span>
        </Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'name']);
</script>
