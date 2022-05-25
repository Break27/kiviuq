<template>
    <div class="relative flex shadow-sm rounded-md">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <slot name="prefix" />
        </div>

        <div class="flex w-full">
            <div @focusin="focused = true" @focusout="focused = false" class="flex w-full">
                <slot />
            </div>

            <div :class="['flex', childBasic, focused ? childFocused : childUnfocused]">
                <slot name="suffix" />
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';

defineProps([
    'childBasic',
    'childFocused',
    'childUnfocused',
]);

const focused = ref(false);
</script>
