<template>
    <textarea :class="[useClass, useBorder, useRing, useText]" :rows="rows" :maxlength="maxLength" :type="type">{{ value }}</textarea>
</template>

<script lang="ts" setup>
defineProps({
    rows: {
        type: String,
        default: '2',
    },
    maxLength: {
        type: String,
        default: '250',
    },
    minHeight: {
        type: String,
        default: '45px',
    },
    maxHeight: {
        type: String,
        default: '180px',
    },
    value: {
        type: String,
        default: '',
    },
    type: {
        type: String,
        default: 'textarea',
    },
    useClass: {
        type: String,
        default: 'textarea flex w-full rounded-md overflow-hidden',
    },
    useBorder: {
        type: String,
        default: 'border border-gray-400 focus:border-indigo-100'
    },
    useRing: {
        type: String,
        default: 'focus:ring-opacity-50'
    },
    useText: {
        type: String,
        default: 'font-medium',
    },
});
</script>

<style scoped>
.textarea {
    min-height: v-bind(minHeight);
    max-height: v-bind(maxHeight);
}
</style>
