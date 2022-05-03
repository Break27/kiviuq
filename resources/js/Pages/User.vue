<template>
    <Head :title="$page.props.username" />

    <Gatekeeper>
        <template #default>
            <Cardboard class="p-6 w-full">
                <template #default>
                    HELLO {{ $page.props.username }} !
                </template>
            </Cardboard>
        </template>
    </Gatekeeper>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Gatekeeper from '@/Layouts/Gatekeeper.vue';
import Cardboard from '@/Components/Cardboard.vue';
</script>
