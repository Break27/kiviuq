<template>
    <div ref="target" class="flex">
        <div class="flex flex-1 pt-1 h-10 justify-center items-start">
            <div v-if="visible && payload">
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

<script setup>
import { Icon } from '@vicons/utils';
import { CircleNotch } from '@vicons/fa';
import { ref, onMounted, onUnmounted } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';

const props = defineProps({
    async: {
        type: Function,
        required: true,
    },
});

const target = ref(null);
const visible = ref(false);
const payload = ref(true);

onMounted(() => {
    props.async.call();
    // detect if the component is visible
    useIntersectionObserver(target, ([{isIntersecting}]) => {
        visible.value = isIntersecting;
        if(isIntersecting)
            props.async.call().then(resolve => {
                payload.value = resolve;
            });
    });
});
</script>
