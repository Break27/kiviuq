<template>
    <Head title="Home" />

    <common-layout use-view-panel>
        <Cardboard class="user-banner h-[18rem]" />
        <Timeline use-tooltip />
    </common-layout>
</template>

<script lang="ts" setup>
import { Head } from '@inertiajs/inertia-vue3';
import CommonLayout from '@/Layouts/Common.vue';
import Timeline from '@/Components/Post/Timeline.vue';
import Cardboard from '@/Components/Cardboard.vue';
</script>
