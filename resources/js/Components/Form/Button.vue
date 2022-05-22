<template>
    <button v-if="!fake" :type="type" :class="classes">
        <slot />
    </button>
    <div v-else :class="[classes, 'cursor-default']">
        <slot />
    </div>
</template>

<script setup>
import {computed} from "vue";

const props = defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    fake: {
        type: Boolean,
        default: false,
    },
    useClass: {
        type: String,
        default: 'inline-flex justify-center items-center rounded-md',
    },
    usePadding: {
        type: String,
        default: 'px-4 py-2',
    },
    useText: {
        type: String,
        default: 'font-semibold text-xs text-white uppercase tracking-widest',
    },
    useTransition: {
        type: String,
        default: 'transition ease-in-out duration-150',
    },
    useColor: {
        type: String,
        default: 'bg-gray-800 border border-transparent focus:outline-none focus:border-gray-900 focus:shadow-outline-gray active:bg-gray-900 hover:bg-gray-700',
    },
});

const classes = computed(() => [props.useClass, props.usePadding, props.useText, props.useTransition, props.useColor]);
</script>
