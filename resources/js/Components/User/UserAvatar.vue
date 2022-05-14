<template>
    <div :class="['flex rounded-sm', {'border-2': !cleanBorder}, {'ring-1 ring-gray-300': !cleanRing}]">
        <div v-if="avatar">

        </div>
        <div v-else class="flex w-full bg-white items-center justify-center">
            <slot name="fallback">
                <Icon v-bind="fallback">
                    <Person />
                </Icon>
            </slot>
        </div>
    </div>
</template>

<script setup>
import { Icon } from '@vicons/utils';
import { Person } from '@vicons/ionicons5';

const props = defineProps({
    avatar: {
        type: String,
        required: true,
    },
    fallback: {
        type: Object,
        default: {size: '16px'},
    },
    cleanBorder: {
        type: Boolean,
        default: false,
    },
    cleanRing: {
        type: Boolean,
        default: false,
    }
});
</script>
