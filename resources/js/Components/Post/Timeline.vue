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
    <Spin :async="fetch" />
</template>

<script setup>
import { ref } from 'vue';
import { Container } from 'vue3-smooth-dnd';
import axios from 'axios';
import Button from '@/Components/Form/Button';
import Cardboard from '@/Components/Cardboard';
import PostPanel from '@/Components/Post/PostPanel';
import Spin from '@/Components/Post/Spin';

const props = defineProps({
    authorUuid: {
        type: String,
    },
    useTooltip: {
        type: Boolean,
        default: false,
    },
});
const posts = ref([]);

let offset = 0;
let latest = 0;
let useDesc = true;
const fetch = async () => {
    let payload = false;
    let url = 'api/v1/timelines/public?offset=' + offset + '&chunk=' + 5 + '&order=' + (useDesc ? 'desc' : 'asc') + '&latest=' + latest;
    if (props.authorUuid) url += '&author_uuid=' + props.authorUuid;

    await axios.get(url)
        .then(response => {
            const dataset = response.data.posts;
            payload = dataset.length > 0;
            if (payload) {
                latest = response.data.latest;
                // merge two arrays
                posts.value.push(...dataset);
                offset++;
            }
        })
        .catch(error => {

        });
    return payload;
}

const changeOrder = () => {
    posts.value = [];
    useDesc = !useDesc;
    offset = 0;
}
</script>
