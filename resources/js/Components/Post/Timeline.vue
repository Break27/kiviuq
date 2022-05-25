<template>
    <!-- Tooltip -->
    <Cardboard v-if="useTooltip" class="p-1.5">
        <Button @click="changeOrder">
            button
        </Button>
    </Cardboard>
    <Container drag-handle-selector=".post-drag-handle"
               group-name="post-draggable"
               class="space-y-2">
        <PostPanel v-if="posts.length > 0"
                   v-for="post in posts"
                   :post="post"
        />
    </Container>
    <Spin :trigger="callback" :on="!satisfied" />
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Container } from 'vue3-smooth-dnd';
import axios from 'axios';
import TimelineRequest from '@/Scripts/Requests/Timeline';

import Button from '@/Components/Form/Button.vue';
import Cardboard from '@/Components/Cardboard.vue';
import PostPanel from '@/Components/Post/PostPanel.vue';
import Spin from '@/Components/Post/Spin.vue';

const props = defineProps({
    authorUuid: {
        type: String,
    },
    useTooltip: {
        type: Boolean,
        default: false,
    },
});

const request = new TimelineRequest(5, true, props.authorUuid);
const posts = ref<Array<any>>([]);
const satisfied = ref(false);

const callback = () => {
    request.fetch().then(res => {
        posts.value.push(...res.posts);
        satisfied.value = !res.hasPayload;
    });
}

const changeOrder = () => {
    posts.value = [];
    satisfied.value = false;
    request.changeOrder();
}
</script>
