<template>
    <Head title="Home" />

    <Gatekeeper>
        <template #default>
            <Cardboard class="p-6">
                <template #default>
                    THIS IS THE HOME PAGE!
                </template>
            </Cardboard>
        </template>
    </Gatekeeper>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Gatekeeper from "@/Layouts/Gatekeeper.vue";
import Cardboard from '@/Components/Cardboard.vue';


</script>
