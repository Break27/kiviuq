<template>
    <button :type="type" class="inline-flex justify-center items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150">
        <slot />
    </button>
</template>

<script setup>
const props = defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
