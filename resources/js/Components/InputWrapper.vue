<template>
    <div class="relative flex shadow-sm rounded-md">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <slot name="prefix" />
        </div>

        <div class="flex w-full">
            <div @focusin="this.focused = true" @focusout="this.focused = false" class="flex w-full">
                <slot />
            </div>

            <div :class="classObject">
                <slot name="suffix" />
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(['childBasic', 'childFocused', 'childUnfocused',])
</script>

<script>
export default {
    data() {
        return {
            focused: false,
        }
    },
    computed: {
        classObject() {
            return {
                [this.props.childBasic]: true,
                [this.props.childFocused]: this.focused,
                [this.props.childUnfocused]: ! this.focused,
            }
        },
    },
}
</script>
