<template>
    <common-layout no-sidebar no-search nav-menu-user>
        <div class="min-h-screen block rounded-t-md bg-white">
            <div class="grid grid-cols-4">
                <div class="block p-4">
                    <UserBadge v-if="$page.props.auth.user" class="pb-4" use-fullname :ellipsis-username="24" />
                    <div class="block divide-y-2">
                        <div v-if="$page.props.auth.user" class="block">
                            <div class="grid py-1">
                                <span class="px-2.5 py-0.5 text-sm font-medium">
                                    Account
                                </span>
                                <TabLink name="Profile"
                                         use-class="py-1.5 px-2 space-x-1.5"
                                         :href="route('settings.profile')"
                                         :active="route().current('settings.profile')">
                                    <Icon>
                                        <User />
                                    </Icon>
                                </TabLink>
                                <TabLink name="Security"
                                         use-class="py-1.5 px-2 space-x-1.5"
                                         :href="route('settings.security')"
                                         :active="route().current('settings.security')">
                                    <Icon>
                                        <Key />
                                    </Icon>
                                </TabLink>
                                <TabLink name="Email"
                                         use-class="py-1.5 px-2 space-x-1.5"
                                         :href="route('settings.email')"
                                         :active="route().current('settings.email')">
                                    <Icon>
                                        <Envelope />
                                    </Icon>
                                </TabLink>
                            </div>
                        </div>
                        <div class="block">
                            <div class="grid py-1.5">
                                <span class="px-2.5 py-0.5 text-sm font-medium">
                                    Preferences
                                </span>
                                <TabLink name="Appearance"
                                         use-class="py-1.5 px-2 space-x-1.5"
                                         :href="route('settings.appearance')"
                                         :active="route().current('settings.appearance')">
                                    <Icon>
                                        <PaintBrush />
                                    </Icon>
                                </TabLink>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid col-span-3 py-4 pr-4">
                    <ProfileTab v-if="$page.props.action.profile" />
                    <SecurityTab v-if="$page.props.action.security" />
                </div>
            </div>
        </div>
    </common-layout>
</template>

<script setup>
import { Icon } from '@vicons/utils';
import { User, Key, Envelope, PaintBrush } from '@vicons/fa';
import CommonLayout from '@/Layouts/Common';
import Cardboard from '@/Components/Cardboard';
import UserBadge from '@/Components/User/UserBadge';
import TabLink from '@/Components/TabLink';
import ProfileTab from "@/Pages/User/Settings/ProfileTab";
import SecurityTab from "@/Pages/User/Settings/SecurityTab";
</script>
