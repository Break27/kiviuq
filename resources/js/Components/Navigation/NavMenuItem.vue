<template>
    <div :class="{'flex' : !noFlex}">
        <slot>
            <Button :class="['w-7 h-7', focused ? 'bg-gray-200 shadow-sm' : 'shadow-md']"
                    @focus="focused = true"
                    @blur="focused = false"
                    use-padding=""
                    use-color="">
                <slot name="icon" />
            </Button>
        </slot>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import Button from '@/Components/Form/Button.vue';

defineProps({
    noFlex: {
        type: Boolean,
        default: false,
    }
})

const focused = ref(false);
</script>
