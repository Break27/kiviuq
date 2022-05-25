<template>
    <Draggable group-name="post-draggable">
        <Cardboard>
            <div class="flex">
                <div class="flex flex-1 p-3 space-x-2.5">
                    <div class="flex">
                        <div>
                            <UserAvatar class="h-12 w-12"
                                        clean-ring
                                        :fallback="{size: '32px'}"
                                        :avatar="post.author.profile.avatar"
                            />
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col space-y-1">
                        <div class="grid grid-cols-2 h-12">
                            <div class="flex flex-col">
                                <div class="flex space-x-2 items-center">
                                    <Link :href="$route('account.show', {username: post.author.account.username})">
                                        <span class="text-xl font-semibold">
                                            {{ post.author.profile.name }}
                                        </span>
                                        <span class="text-gray-400">
                                            @{{ post.author.account.username }}{{ post.author.account.domain !== $page.props.app.domain ? '@' + post.author.account.domain : '' }}
                                        </span>
                                    </Link>
                                </div>
                                <span class="text-sm text-gray-400">
                                    {{ post.created_at.split('T')[0] }}
                                </span>
                            </div>
                        </div>
                        <div class="block">
                            <div class="prose" v-html="marked.parse(post.content)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 bg-gray-200 space-y-6 p-2"
                     @mouseenter="entered = true"
                     @mouseleave="entered = false">
                    <div class="justify-center items-center text-center post-drag-handle">
                        <Icon size="26px">
                            <Bars class="text-gray-400 cursor-grab active:cursor-grabbing" />
                        </Icon>
                    </div>
                    <div class="flex flex-col space-y-1 self-end">
                        <Button use-padding="" use-color="">
                            <Icon size="18px">
                                <Plus :class="[[entered ? 'text-green-500' : 'text-gray-400'], transition]" />
                            </Icon>
                        </Button>

                        <div class="flex justify-center items-center rounded-lg bg-gray-300 w-8 h-8">
                            <span :class="['font-bold', transition, entered ? 'text-black' : 'text-gray-500']">
                                {{ post.score }}
                            </span>
                        </div>

                        <Button use-padding="" use-color="">
                            <Icon size="18px">
                                <Minus :class="[[entered ? 'text-red-500' : 'text-gray-400'], transition]" />
                            </Icon>
                        </Button>
                    </div>
                </div>
            </div>
        </Cardboard>
    </Draggable>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Draggable } from 'vue3-smooth-dnd';
import { Link } from '@inertiajs/inertia-vue3';

import { Icon } from "@vicons/utils";
import Bars from '@vicons/fa/Bars';
import Plus from '@vicons/fa/Plus';
import Minus from '@vicons/fa/Minus';

import { marked } from 'marked';
import Cardboard from '@/Components/Cardboard.vue';
import UserAvatar from '@/Components/User/UserAvatar.vue';
import Button from '@/Components/Form/Button.vue';

const entered = ref(false);
const transition = 'transition-colors duration-500 ease-in-out';

const props = defineProps({
    post: {
        required: true,
    },
    error: {
        type: Boolean,
        default: false,
    }
});
</script>
