<template>
    <div>{{ this.summon ? summoned = true : '' }}</div>

    <template ref="root">
        <div class="modal-mask fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <div class="fixed inset-y-0 right-0">
                <slot name="control" />
            </div>

            <slot>
                <Cardboard class="p-4 fixed">
                    <div class="modal-header">
                        <slot name="card-header" />
                    </div>
                    <div class="modal-body">
                        <slot name="card-body" />
                    </div>
                    <div class="modal-footer">
                        <slot name="card-footer" />
                    </div>
                </Cardboard>
            </slot>
        </div>
    </template>
</template>

<script lang="ts">
import { onMounted, onUnmounted, h, ref } from "vue";
import { Teleport } from '@/Utils/teleport';
import Cardboard from '@/Components/Cardboard.vue';

const modal = ref<Teleport|null>(null);
const visible = ref(false);

const show = (portal) => {
    if(! visible.value) {
        modal.value!.teleport(portal);
        visible.value = true;
    }
}

const destroy = (timeout) => {
    if(visible.value) {
        modal.value!.revoke(timeout);
        visible.value = false;
    }
}

export default {
    props: {
        summon: {
            type: String,
            default: ''
        },
    },
    setup(props) {
        const root = ref<HTMLTemplateElement|null>(null);
        const summoned = ref(false);

        onMounted(() => {
            const vnode = [h('div', {}, Object.getOwnPropertyDescriptor(root.value!.firstChild!, '__vnode')!.value)];
            (modal.value as Teleport) = new Teleport(vnode);

            if(summoned.value) show(props.summon);
        });

        onUnmounted(() => {
            destroy(0);
        });

        return { root, summoned };
    },
    methods: {
        showModal(portal) {
            show(portal);
        },
        dismiss() {
            destroy(150);
        }
    },
    components: {
        Cardboard,
    }
}
</script>
