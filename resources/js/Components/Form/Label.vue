<template>
    <label :class="['block', useText]">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<script setup>
defineProps({
    value: {
        type: String,
    },
    useText: {
        type: String,
        default: 'font-medium text-sm text-gray-700',
    }
});
</script>
