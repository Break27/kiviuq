<template>
    <div class="flex rounded-sm border-2 ring-1 ring-gray-300">
        <div v-if="user">

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
    user: {
        type: String,
        required: true,
    },
    fallback: {
        type: Object,
        default: {size: '16px'},
    },
});
</script>
