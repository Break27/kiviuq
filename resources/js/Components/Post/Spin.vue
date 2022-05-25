<template>
    <div ref="target" class="flex">
        <div class="flex flex-1 pt-1 h-10 justify-center items-start">
            <div v-if="visible && on">
                <Icon>
                    <CircleNotch class="animate-spin" />
                </Icon>
            </div>
            <div v-else>
                <span class="text-gray-400 text-xl">No more content...</span>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';

import { Icon } from '@vicons/utils';
import CircleNotch from '@vicons/fa/CircleNotch';

const props = defineProps({
    trigger: {
        type: Function,
        required: true,
    },
    on: {
        type: Boolean,
        default: false,
    }
});

const target = ref(null);
const visible = ref(false);

onMounted(() => {
    props.trigger.call(this);

    // detect if the component is visible
    useIntersectionObserver(target, ([{isIntersecting}]) => {
        visible.value = isIntersecting;
        if(isIntersecting && props.on) {
            props.trigger.call(this);
        }
    });
});
</script>
