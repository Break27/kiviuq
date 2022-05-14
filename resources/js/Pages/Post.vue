<template>
    <Gatekeeper>
        <template #default>
            <PostPanel author-fullname=""
                       author=""
                       avatar=""
                       content=""
                       created=""
                       score=""
            />
        </template>
    </Gatekeeper>
</template>

<script setup>
import Gatekeeper from '@/Layouts/Gatekeeper';
import PostPanel from "@/Components/Post/PostPanel";
</script>
