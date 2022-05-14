<template>
    <common-layout v-bind="attrsObject">
        <template #navLinks>
            <BreezeNavLink :href="route('home')" :active="route().current('home')">
                HOME
            </BreezeNavLink>
            <BreezeNavLink :href="route('community')" :active="route().current('community')">
                COMMUNITY
            </BreezeNavLink>
            <BreezeNavLink v-if="isAuth"
                           :href="route('account.show', auth.account.username)"
                           :active="route().current('account.show', { username: auth.account.username })">
                <span class="uppercase">
                    {{ auth.profile.name }}
                </span>
            </BreezeNavLink>
        </template>

        <template #sidebar-fixed>
            <slot name="sidebar-fixed-expand">
                <UserPanel :is-auth="isAuth" />
            </slot>
        </template>

        <template #sidebar>
            <slot name="sidebar-expand" />
        </template>

        <template #default>
            <slot />
        </template>
    </common-layout>
</template>

<script setup>
import CommonLayout from './Common.vue';
import BreezeNavLink from '@/Components/Navigation/NavLink.vue';
import Cardboard from '@/Components/Cardboard.vue';
import Button from '@/Components/Form/Button.vue';
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import UserPanel from '@/Components/Sidebar/UserPanel';

const auth = computed(() => usePage().props.value.auth);
const isAuth = auth.value.user != null;

const props = defineProps(['attrs']);
const attrsObject = props.attrs ? JSON.parse(props.attrs) : {};
</script>
