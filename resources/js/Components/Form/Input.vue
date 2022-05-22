<template>
    <input :class="[useClass, useBorder, useRing]"
           :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)"
           ref="input">
</template>

<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: String,
    },
    useClass: {
        type: String,
        default: 'rounded-md',
    },
    useBorder: {
        type: String,
        default: 'border border-gray-300 focus:border-indigo-300',
    },
    useRing: {
        type: String,
        default: 'focus:ring-1 focus:ring-indigo-200 focus:ring-opacity-50',
    }
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>
