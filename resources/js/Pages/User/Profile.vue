<template>
    <Head :title="$page.props.target.profile.name + ' (' + fullname + ')'" />

    <common-layout nav-menu-user nav-menu-music>
        <template #default>
            <Cardboard>
                <div class="flex flex-col user-banner">
                    <div class="flex h-56"></div>
                    <div class="grid grid-cols-1 relative">
                        <div class="h-10">
                            <UserAvatar class="w-28 h-28 ml-6 absolute"
                                        :fallback="{size: '96px'}"
                                        :avatar="target.profile.avatar"
                            />
                        </div>
                        <div class="h-20 bg-white">
                            <div class="grid grid-cols-2 pl-[9.5rem] pt-2 pr-4">
                                <div class="grid grid-cols-1">
                                    <div class="text-2xl font-semibold">
                                        {{ $page.props.target.profile.name }}
                                    </div>
                                    <div class="text-gray-500">
                                        {{ fullname }}
                                    </div>
                                </div>
                                <div class="flex justify-end items-center gap-x-2">
                                    <!-- todo - follow feature -->
                                    <Link :href="isOwner ? $route('settings.profile') : '.'">
                                        <Button use-padding="p-2">
                                            <div v-if="isOwner" class="flex">
                                                <Icon size="16"><PencilAlt /></Icon>
                                                <span class="pl-2">edit profile</span>
                                            </div>
                                            <div v-else class="flex">
                                                <Icon size="18"><PersonAdd /></Icon>
                                                <span class="pl-2">follow</span>
                                            </div>
                                        </Button>
                                    </Link>
                                    <Button use-color="bg-transparent border-2 hover:bg-gray-100 active:bg-gray-200"
                                            use-padding="p-1"
                                            v-if="!isOwner">
                                        <Icon size="24">
                                            <EllipsisVertical class="text-gray-400" />
                                        </Icon>
                                    </Button>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 h-10 flex justify-items-end bg-white space-x-3">
                            <NavLink :href="$route('account.show', account.username)"
                                     :active="$route().current('account.show')"
                                     preserve-scroll>
                                <NavLinkText>posts</NavLinkText>
                            </NavLink>
                            <NavLink :href="$route('account.media', account.username)"
                                     :active="$route().current('account.media')"
                                     preserve-scroll>
                                <NavLinkText>media</NavLinkText>
                            </NavLink>
                            <NavLink :href="$route('account.zone', account.username)"
                                     :active="$route().current('account.zone')"
                                     preserve-scroll>
                                <NavLinkText>zone</NavLinkText>
                            </NavLink>
                            <NavLink :href="$route('account.friends', account.username)"
                                     :active="$route().current('account.friends')"
                                     preserve-scroll>
                                <NavLinkText>friends</NavLinkText>
                            </NavLink>
                        </div>
                    </div>
                </div>
            </Cardboard>

            <!-- Content Panels -->
            <Timeline v-if="$page.props.action.show"
                      :author-uuid="account.uuid"
            />

            <Cardboard v-else class="p-6">
                <div v-if="$page.props.action.media">THIS IS MEDIA!</div>

                <div v-if="$page.props.action.zone">THIS IS PROFILE!</div>

                <div v-if="$page.props.action.friends">THIS IS FRIENDS!</div>
            </Cardboard>
        </template>

        <template #sidebar-fixed>
            <div></div>
        </template>

        <template #sidebar>
            <Cardboard class="py-4">
                <div class="grid grid-cols-3 text-center divide-x-2 px-1">
                    <StatBoard title="posts">{{ account.posts }}</StatBoard>
                    <StatBoard title="following">{{ account.following }}</StatBoard>
                    <StatBoard title="followers">{{ account.followers }}</StatBoard>
                </div>
            </Cardboard>
            <Cardboard v-if="target.profile.bio" title="bio" title-class="bg-blue-400">
                <div class="pt-1 px-4 pb-4">
                    <span>{{ target.profile.bio }}</span>
                </div>
            </Cardboard>
        </template>
    </common-layout>
</template>

<script lang="ts" setup>
import { computed, defineComponent } from 'vue';
import { Head, Link, usePage } from '@inertiajs/inertia-vue3';

import { Icon } from '@vicons/utils';
import PersonAdd from '@vicons/ionicons5/PersonAdd';
import EllipsisVertical from '@vicons/ionicons5/EllipsisVertical';
import PencilAlt from '@vicons/fa/PencilAlt';

import CommonLayout from '@/Layouts/Common.vue';
import Cardboard from '@/Components/Cardboard.vue';
import UserAvatar from '@/Components/User/UserAvatar.vue';
import Button from '@/Components/Form/Button.vue';
import NavLink from '@/Components/Navigation/NavLink.vue';
import Timeline from '@/Components/Post/Timeline.vue';

const target = computed<any>(() => usePage().props.value.target);
const account = target.value.account;
const isOwner = target.value.isOwner;
const fullname = account.username + '@' + (usePage().props.value.app as any).domain;

const NavLinkText = defineComponent({
    template: `
        <span class="text-md uppercase font-semibold">
            <slot />
        </span>
    `,
});

const StatBoard = defineComponent({
    props: [
        'title',
    ],
    template: `
        <div class="grid grid-row-2">
            <span class="uppercase text-gray-500 font-semibold text-xs">
                {{ title }}
            </span>
            <span class="text-xl text-gray-800 font-semibold">
                <slot />
            </span>
        </div>
    `,
});
</script>
