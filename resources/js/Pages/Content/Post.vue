<template>
    <common-layout>
        <PostPanel :post="post" />
    </common-layout>
</template>

<script lang="ts" setup>
import { usePage } from '@inertiajs/inertia-vue3';
import CommonLayout from '@/Layouts/Common.vue';
import PostPanel from '@/Components/Post/PostPanel.vue';

const post = usePage().props.value.post;
</script>
