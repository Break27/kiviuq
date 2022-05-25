<template>
    <Link as="button">
        <div :class="['flex rounded-md items-center transition-colors duration-200 ease-in-out py-1', classes, useClass]">
            <slot v-if="!iconRear" />

            <span :class="['flex flex-1', text]">
                {{ name }}
            </span>

            <slot v-if="iconRear" />
        </div>
    </Link>
</template>

<script lang="ts" setup>
import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    useClass: {
        type: String,
        default: '',
    },
    text : {
        type: String,
        default: 'text-sm uppercase font-semibold',
    },
    iconRear: {
        type: Boolean,
        default: false,
    },
    active: {
        type: Boolean,
        default: false,
    },
    useActive: {
        type: String,
        default: 'text-white bg-blue-500 hover:bg-blue-400 active:bg-blue-600',
    },
    useInactive: {
        type: String,
        default: 'hover:bg-gray-100 active:bg-gray-300',
    }
});

const classes = computed(() => props.active
    ? props.useActive
    : props.useInactive
);
</script>
