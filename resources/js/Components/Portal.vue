<template>
    <div :id="props.name" ref="portal"
         :class="['transition-all ease-in-out', {'opacity-0': !visible}]">
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

const props = defineProps({
    name: {
        type: String,
        default: 'portal'
    }
});

const portal = ref(null);
const visible = ref(false);

function handleEvent(event) {
    visible.value = event.detail.arrival;
}

onMounted(() => {
    portal.value.addEventListener('notify', handleEvent);
});

onBeforeUnmount(() => {
    portal.value.removeEventListener('notify', handleEvent)
});
</script>
