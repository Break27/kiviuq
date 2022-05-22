<template>
    <div class="flex flex-1 space-x-2">
        <div class="flex flex-shrink-0">
            <slot>
                <UserAvatar class="h-12 w-12"
                            clean-ring
                            :fallback="{size: '32px'}"
                            :avatar="auth.profile.avatar"
                />
            </slot>
        </div>
        <div class="flex flex-col">
            <div class="font-semibold text-xl">
                {{ ellipsis(auth.profile.name, ellipsisName) }}
            </div>
            <div class="text-sm text-gray-500">
                @{{ ellipsis(auth.account.username + (useFullname ? '@' + auth.account.domain : ''), ellipsisUsername) }}
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';
import { ellipsis } from '@/Utils/misc';
import UserAvatar from '@/Components/User/UserAvatar';

const auth = computed(() => usePage().props.value.auth);

defineProps({
    useFullname: {
        type: Boolean,
        default: false,
    },
    ellipsisName: {
        type: Number,
        default: 17,
    },
    ellipsisUsername: {
        type: Number,
        default: 18,
    }
});
</script>
