<template>
    <Cardboard>
        <div class="flex">
            <div class="flex flex-1 p-3 space-x-2.5">
                <div class="flex">
                    <div>
                        <UserAvatar class="h-12 w-12"
                                    clean-ring
                                    :fallback="{size: '32px'}"
                                    :user="avatar"
                        />
                    </div>
                </div>
                <div class="flex flex-1 flex-col space-y-1">
                    <div class="grid grid-cols-2 h-12">
                        <div class="flex flex-col">
                            <div>
                                <span>{{ author }}</span>
                                <span>{{ authorFullname }}</span>
                            </div>
                            <span>{{ created }}</span>
                        </div>
                    </div>
                    <div class="flex flex-1">
                        <div>{{ content }}</div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 bg-gray-200 space-y-6 p-2"
                 @mouseenter="entered = true"
                 @mouseleave="entered = false">
                <div class="justify-center items-center text-center">
                    <Icon size="26px">
                        <Bars class="text-gray-400 cursor-grab active:cursor-grabbing" />
                    </Icon>
                </div>
                <div class="flex flex-col space-y-1 self-end">
                    <Button clean-padding clean-color>
                        <Icon size="18px">
                            <Plus :class="[[entered ? 'text-green-500' : 'text-gray-400'], transition]" />
                        </Icon>
                    </Button>

                    <div class="text-center rounded-lg bg-gray-300 w-8 h-8">
                        <span>{{ score }}</span>
                    </div>

                    <Button clean-padding clean-color>
                        <Icon size="18px">
                            <Minus :class="[[entered ? 'text-red-500' : 'text-gray-400'], transition]" />
                        </Icon>
                    </Button>
                </div>
            </div>
        </div>
    </Cardboard>
</template>

<script setup>
import { ref } from 'vue';
import { Icon } from "@vicons/utils";
import { Bars, Plus, Minus } from '@vicons/fa';
import Cardboard from '@/Components/Cardboard.vue';
import UserAvatar from '@/Components/User/UserAvatar.vue';
import Button from '@/Components/Form/Button';

const entered = ref(false);
const transition = 'transition-colors duration-500 ease-in-out';

defineProps({
    avatar: {
        required: true,
    },
    author: {
        required: true,
    },
    authorFullname: {
        required: true,
    },
    content: {
        required: true,
    },
    created: {
        required: true,
    },
    score: {
        required: true,
    },
    error: {
        type: Boolean,
        default: false,
    }
});
</script>
