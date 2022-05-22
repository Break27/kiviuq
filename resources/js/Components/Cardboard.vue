<template>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex flex-col">
            <slot name="header">
                <div v-if="title" class="flex">
                    <div :class="['w-full text-white px-3 pb-0.5 py-1 font-semibold uppercase', titleClass]">
                        {{ title }}
                    </div>
                </div>
            </slot>
            <div class="block">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps(['title', 'titleClass'])
</script>
