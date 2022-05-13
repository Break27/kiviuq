<template>
    <div :class="{'flex' : !noFlex}">
        <slot>
            <Button :class="classObject"
                    @focus="focused = true"
                    @blur="focused = false"
                    clean-padding
                    clean-color>
                <slot name="icon" />
            </Button>
        </slot>
    </div>
</template>

<script>
import Button from '@/Components/Form/Button.vue';

export default {
    props: {
        noFlex: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            focused: false,
        }
    },
    computed: {
        classObject() {
            return {
                'w-7 h-7': true,
                'shadow-md': !this.focused,
                'bg-gray-200 shadow-sm': this.focused,
            }
        }
    },
    components: {
        Button,
    }
}
</script>
