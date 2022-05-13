<template>
    <Head :title="fullname" />

    <Gatekeeper nav-menu-user nav-menu-music>
        <template #default>
            <Cardboard>
                <div class="flex flex-col user-banner">
                    <div class="flex h-56"></div>
                    <div class="grid grid-cols-1 relative">
                        <div class="h-10">
                            <UserAvatar class="w-28 h-28 ml-6 absolute"
                                        :fallback="{size: '96px'}"
                                        :user="''"
                            />
                        </div>
                        <div class="h-20 bg-white">
                            <div class="grid grid-cols-2 pl-[9.5rem] pt-2 pr-4">
                                <div class="grid grid-cols-1">
                                    <div class="text-2xl font-semibold">
                                        {{ profile.name }}
                                    </div>
                                    <div class="text-gray-500">
                                        {{ fullname }}
                                    </div>
                                </div>
                                <div class="flex justify-end items-center gap-x-2">
                                    <Button clean-padding class="p-2">
                                        <Icon size="18"><PersonAdd /></Icon>
                                        <span class="pl-2">follow</span>
                                    </Button>
                                    <Button class="p-1 bg-transparent border-2 hover:bg-gray-100 active:bg-gray-200"
                                            clean-padding
                                            clean-color>
                                        <Icon size="24">
                                            <EllipsisVertical class="text-gray-400" />
                                        </Icon>
                                    </Button>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 h-10 flex justify-items-end bg-white space-x-3">
                            <NavLink :href="route('user.show', profile.username)"
                                     :active="route().current('user.show')">
                                <NavLinkText>posts</NavLinkText>
                            </NavLink>
                            <NavLink :href="route('user.media', profile.username)"
                                     :active="route().current('user.media')">
                                <NavLinkText>media</NavLinkText>
                            </NavLink>
                            <NavLink :href="route('user.profile', profile.username)"
                                     :active="route().current('user.profile')">
                                <NavLinkText>profile</NavLinkText>
                            </NavLink>
                            <NavLink :href="route('user.friends', profile.username)"
                                     :active="route().current('user.friends')">
                                <NavLinkText>friends</NavLinkText>
                            </NavLink>
                        </div>
                    </div>
                </div>
            </Cardboard>
            <Cardboard class="p-6 w-full">
                HELLO {{ profile.name }} !
            </Cardboard>
        </template>

        <template #sidebar-fixed-expand>
            <div></div>
        </template>

        <template #sidebar-expand>
            <Cardboard class="py-4">
                <div class="grid grid-cols-3 text-center divide-x-2 px-1">
                    <StatBoard title="posts">{{ 0 }}</StatBoard>
                    <StatBoard title="following">{{ 0 }}</StatBoard>
                    <StatBoard title="followers">{{ 0 }}</StatBoard>
                </div>
            </Cardboard>
            <Cardboard>
                <div class="grid grid-cols-1">
                    <div class="bg-blue-400 text-white px-4 py-1 font-semibold uppercase">
                        bio
                    </div>
                    <div class="pt-1 px-4 pb-4">
                        THIS IS BIO! Elementum pulvinar etiam non quam lacus suspendisse
                        faucibus interdum. Nulla posuere sollicitudin aliquam ultrices sagittis.
                    </div>
                </div>
            </Cardboard>
        </template>
    </Gatekeeper>
</template>

<script setup>
import { computed, defineComponent } from 'vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import { Icon } from '@vicons/utils';
import { Person, PersonAdd, EllipsisVertical } from '@vicons/ionicons5';
import Gatekeeper from '@/Layouts/Gatekeeper.vue';
import Cardboard from '@/Components/Cardboard.vue';
import UserAvatar from '@/Components/User/UserAvatar.vue';
import StatBoard from '@/Components/Sidebar/StatBoard.vue';
import Button from '@/Components/Form/Button.vue';
import NavLink from '@/Components/Navigation/NavLink';

const target = computed(() => usePage().props.value.target);
const profile = target.value.profile;
const fullname = profile.username + '@' + usePage().props.value.app.domain;

const NavLinkText = defineComponent({
    template: `
        <span class="text-md uppercase font-semibold">
            <slot />
        </span>
    `,
});
</script>
