<template>
    <Head title="Home" />

    <common-layout use-view-panel>
        <Cardboard class="user-banner h-[18rem]" />
        <Timeline use-tooltip />
    </common-layout>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import CommonLayout from '@/Layouts/Common.vue';
import Timeline from '@/Components/Post/Timeline';
import Cardboard from "@/Components/Cardboard";
</script>
