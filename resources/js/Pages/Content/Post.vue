<template>
    <common-layout>
        <PostPanel :post="post" />
    </common-layout>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import CommonLayout from '@/Layouts/Common.vue';
import PostPanel from '@/Components/Post/PostPanel';

const post = usePage().props.value.post;
</script>
