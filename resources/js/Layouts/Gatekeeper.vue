<template>
    <common-layout>
        <template #navLinks>
            <BreezeNavLink :href="route('home')" :active="route().current('home')">
                HOME
            </BreezeNavLink>
            <BreezeNavLink :href="route('community')" :active="route().current('community')">
                COMMUNITY
            </BreezeNavLink>
            <BreezeNavLink v-if="isAuth" :href="route('user', username)" :active="route().current('user')">
                {{ user.name.toUpperCase() }}
            </BreezeNavLink>
        </template>

        <template #default>
            <slot />
        </template>
    </common-layout>
</template>

<script setup>
import CommonLayout from './Common.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const user = computed(() => usePage().props.value.auth.user).value;

const username = user != null ? user.name : undefined
const isAuth = user != null
</script>
