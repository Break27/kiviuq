<template>
    <div :id="props.name" ref="portal"
         :class="['transition-all duration-300 ease-in-out absolute z-20', {'opacity-0': !visible}]">
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
    const classes = document.getElementsByClassName('os-scrollbar-vertical').item(0).classList;
    visible.value
        ? classes.add('hidden')
        : classes.remove('hidden');
}

onMounted(() => {
    portal.value.addEventListener('notify', handleEvent);
});

onBeforeUnmount(() => {
    portal.value.removeEventListener('notify', handleEvent)
});
</script>
