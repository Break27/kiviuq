<template>
    <button :type="type"
            :class="[
                {'inline-flex justify-center items-center rounded-md': !clean},
                {'px-4 py-2': !cleanPadding},
                {'font-semibold text-xs text-white uppercase tracking-widest': !cleanText},
                {'transition ease-in-out duration-150': !cleanTransition},
                {'bg-gray-800 border border-transparent focus:outline-none focus:border-gray-900 focus:shadow-outline-gray active:bg-gray-900 hover:bg-gray-700': !cleanColor}
            ]"
    >
        <slot />
    </button>
</template>

<script setup>
const props = defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    clean: {
        type: Boolean,
        default: false,
    },
    cleanPadding: {
        type: Boolean,
        default: false,
    },
    cleanText: {
        type: Boolean,
        default: false,
    },
    cleanTransition: {
        type: Boolean,
        default: false,
    },
    cleanColor: {
        type: Boolean,
        default: false,
    },
});
</script>
