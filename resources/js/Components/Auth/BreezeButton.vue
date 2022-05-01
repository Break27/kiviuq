<template>
    <Button class="bg-gray-800 border border-transparent focus:outline-none focus:border-gray-900 focus:shadow-outline-gray active:bg-gray-900 hover:bg-gray-700">
        <template #default>
            <slot />
        </template>
    </Button>
</template>

<script setup>
import Button from '@/Components/Button.vue';
</script>
