<template>
    <div v-if="hasErrorsRef">
        <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const errors = computed(() => usePage().props.value.errors);
const hasErrorsRef = computed(() => Object.keys(errors.value).length > 0);

export default {
    setup() {
        return { errors, hasErrorsRef };
    },
    methods: {
        getErrors() {
            return errors.value;
        },
        hasErrors() {
            return hasErrorsRef.value;
        },
    }
}
</script>
