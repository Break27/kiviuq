<template>
    <Cardboard :class="[{'collapsible': isAuth}, collapsed && isAuth ? 'h-[4.25rem]' : 'h-full']">
        <div v-if="isAuth" class="flex flex-col bg-gray-200">
            <div class="grid grid-cols-2 rounded-md bg-white p-2.5">
                <UserBadge />
                <div class="flex justify-end pr-1.5">
                    <Button :class="['transition-transform transform', {'rotate-180': !collapsed}]"
                            @click="collapsed = !collapsed"
                            @blur="collapsed = !freeze"
                            use-color=""
                            use-padding="">
                        <Icon color="black" size="18">
                            <ChevronDown />
                        </Icon>
                    </Button>
                </div>
            </div>
            <div @mouseenter="freeze = true"
                 @mouseleave="freeze = false">
                <div class="grid py-1 px-1 space-y-1">
                    <TabLink icon-rear
                             use-class="pl-3 pr-2.5"
                             name="logout"
                             method="post"
                             :href="route('logout')">
                        <Icon>
                            <LogOutSharp />
                        </Icon>
                    </TabLink>
                    <TabLink icon-rear
                             name="settings"
                             use-class="pl-3 pr-3"
                             :href="route('settings.appearance')">
                        <Icon>
                            <SettingsSharp />
                        </Icon>
                    </TabLink>
                </div>
            </div>
        </div>
        <div v-else class="flex justify-between align-items-end gap-x-2 p-4">
            <Link :href="route('register')" class="w-full">
                <Button @click="route('register')"
                        use-color=""
                        class="w-full text-gray-800 bg-white border-2 border-gray-800 text-black hover:text-white hover:border-gray-600 hover:bg-gray-600 active:bg-gray-900 active:border-gray-900">
                    <span>Register</span>
                </Button>
            </Link>
            <Link :href="route('login')" class="w-full">
                <Button class="w-full">
                    <span>Log In</span>
                </Button>
            </Link>
        </div>
    </Cardboard>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import { Icon } from '@vicons/utils';
import { LogOutSharp, SettingsSharp } from '@vicons/ionicons5';
import { ChevronDown } from '@vicons/fa';
import Cardboard from '@/Components/Cardboard.vue';
import Button from '@/Components/Form/Button.vue';
import TabLink from "@/Components/TabLink";
import UserBadge from "@/Components/User/UserBadge";

defineProps({
    isAuth: {
        type: Boolean,
        default: false,
    },
});

const collapsed = ref(true);
const freeze = ref(false);
</script>

<style scoped>
.collapsible {
    transition-property: height;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 200ms;
}
</style>
