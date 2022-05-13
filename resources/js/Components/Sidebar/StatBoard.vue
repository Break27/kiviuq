<template>
    <div class="grid grid-row-2">
        <span class="uppercase text-gray-500 font-semibold text-xs">
            {{ title }}
        </span>
        <span class="text-xl text-gray-800 font-semibold">
            <slot />
        </span>
    </div>
</template>

<script setup>
defineProps(['title']);
</script>
