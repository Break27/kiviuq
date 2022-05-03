<template>
    <common-layout id="portal">
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

        <template #userPanel>
            <Cardboard class="p-4">
                <template #default v-if="isAuth">
                    <span>
                        Name: {{ $page.props.auth.user.name }}
                    </span>
                    <span class="float-right text-blue-500">
                        <Link :href="route('logout')" method="post">
                            Logout
                        </Link>
                    </span>
                </template>
                <template #default v-else>
                    <div class="flex justify-between align-items-end gap-x-2">
                        <Link :href="route('register')" class="w-full">
                            <Button @click="route('register')" class="w-full text-gray-800 bg-white border-2 border-gray-800 hover:text-white hover:border-gray-600 hover:bg-gray-600 active:bg-gray-900 active:border-gray-900">
                                <span>Register</span>
                            </Button>
                        </Link>
                        <Link :href="route('login')" class="w-full">
                            <BreezeButton class="w-full">
                                <span>Log In</span>
                            </BreezeButton>
                        </Link>
                    </div>
                </template>
            </Cardboard>
        </template>

        <template #default>
            <slot />
        </template>
    </common-layout>
</template>

<script setup>
import CommonLayout from './Common.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import Cardboard from '@/Components/Cardboard.vue';
import BreezeButton from '@/Components/Auth/BreezeButton.vue';
import Button from '@/Components/Button.vue';
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';

const user = computed(() => usePage().props.value.auth.user).value;

const username = user != null ? user.name : undefined
const isAuth = user != null
</script>
