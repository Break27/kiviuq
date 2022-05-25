<template>
    <Head title="Community" />

    <common-layout>
        <Cardboard class="p-6 w-full">
            <template #default>
                THIS IS THE COMMUNITY PAGE!
            </template>
        </Cardboard>
    </common-layout>
</template>

<script lang="ts" setup>
import { Head } from '@inertiajs/inertia-vue3';
import CommonLayout from '@/Layouts/Common.vue';
import Cardboard from '@/Components/Cardboard.vue';
</script>
