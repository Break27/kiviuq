<template>
    <div @click="showModal" class="modal-trigger">
        <slot name="trigger" />
    </div>

    <template ref="root">
        <div class="modal-mask absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <div v-if="this.$slots.CloseBg" @click="dismiss" class="flex justify-start items-start">
                <!-- Close Button -->
                <slot name="close-bg" />
            </div>

            <Cardboard class="p-4 fixed">
                <div class="modal-header">
                    <slot name="header" />
                </div>
                <div class="modal-content">
                    <slot name="content" />
                </div>
                <div class="modal-footer">
                    <slot name="footer" />
                </div>
            </Cardboard>
        </div>
    </template>
</template>

<script>
import { onMounted, h, ref } from "vue";
import { createTeleport } from "@/Utils/teleport";
import Cardboard from '@/Components/Cardboard.vue';

export default {
    props: {
        portal: {
            type: String,
            default: '#app'
        },
    },
    setup(props) {
        const root = ref(null);
        const modal = ref(null);
        const visible = ref(false);

        onMounted(() => {
            const vnode = [h('div', {}, root.value.firstChild.__vnode)];
            modal.value = createTeleport(vnode);
        });

        const showModal = () => {
            if(! visible.value) {
                modal.value.teleport(props.portal);
                visible.value = true;
            }
        }

        const dismiss = () => {
            if(visible.value) {
                modal.value.revoke();
                visible.value = false;
            }
        }

        return { showModal, dismiss, root };
    },
    components: {
        Cardboard,
    }
}
</script>
