<template>
    <div v-if=" !errors ? false : check(errors)">
        <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <li v-for="(error, key) in errors" :key="key">
                {{ Array.isArray(error) ? error.join(' ') : error }}
            </li>
        </ul>
    </div>
</template>

<script lang="ts">
import { ref } from 'vue';

const hasErrors = ref(false);

export default {
    props: {
        errors: {
            type: Object,
            default: null
        },
    },
    setup() {
        const check = (errors) => {
            hasErrors.value = Object.keys(errors).length > 0;
            return hasErrors.value;
        }
        return { check }
    },
    methods: {
        hasErrors() {
            return hasErrors.value;
        },
    }
}
</script>
