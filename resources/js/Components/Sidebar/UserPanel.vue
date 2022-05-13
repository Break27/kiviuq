<template>
    <Cardboard class="p-4">
        <template #default v-if="isAuth">
            <div class="flex">
                <div class="flex-col">
                    <span class="flex"> Username: @{{ $page.props.auth.user.username }} </span>
                    <span class="flex"> Name: {{ $page.props.auth.profile.name }} </span>
                </div>
                <span class="float-right text-blue-500">
                    <Link :href="route('logout')" method="post">
                        Logout
                    </Link>
                </span>
            </div>
        </template>
        <template #default v-else>
            <div class="flex justify-between align-items-end gap-x-2">
                <Link :href="route('register')" class="w-full">
                    <Button @click="route('register')"
                            clean-color
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
        </template>
    </Cardboard>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Cardboard from '@/Components/Cardboard.vue';
import Button from '@/Components/Form/Button.vue';

defineProps({
    isAuth: {
        type: Boolean,
        default: false,
        required: true,
    }
});
</script>
