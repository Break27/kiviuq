<template>
    <Head title="Home" />

    <Gatekeeper>
        <template #default>
            <Cardboard class="p-6 w-full">
                <template #default>
                    THIS IS THE HOME PAGE!

                    <Modal portal="#portal">
                        <template #trigger>
                            <Button type="button" class="bg-gray-300">
                                <span>Button</span>
                            </Button>
                        </template>

                        <template #close-bg>
                            <Button class="bg-white text-red-600">Close</Button>
                        </template>

                        <template #content>
                            THIS IS THE CONTENT
                        </template>
                    </Modal>
                </template>
            </Cardboard>
        </template>
    </Gatekeeper>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { defineComponent } from 'vue';

import Gatekeeper from "@/Layouts/Gatekeeper.vue";
import Cardboard from '@/Components/Cardboard.vue';
import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Button.vue';

const ModalComponent = defineComponent({

});
</script>
