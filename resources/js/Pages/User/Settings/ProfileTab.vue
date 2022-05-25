<template>
    <Head title="Account" />

    <form>
        <div class="grid grid-cols-2">
            <div class="block">
                <div>
                    <Label value="Name" use-text="font-bold pl-1.5" />
                    <Input class="mt-1 p-1.5 block w-full font-semibold"
                                 use-border="border-gray-400"
                                 type="text"
                                 required
                                 :placeholder="$page.props.auth.user.username"
                                 :model-value="$page.props.auth.profile.name"
                    />
                </div>
                <div class="mt-4">
                    <Label value="Bio" use-text="font-bold pl-1.5" />
                    <TextArea type="textarea" max-height="300px" rows="4" />
                </div>
                <div class="flex justify-end mt-4">
                    <Button use-color="bg-blue-500 border border-transparent focus:outline-none focus:border-border-200 focus:shadow-outline-blue active:bg-blue-500 hover:bg-blue-400">
                        save profile
                    </Button>
                </div>
            </div>
            <div class="block pl-4 space-y-4">
                <div>
                    <Label value="Badge" use-text="font-bold pl-1.5 pb-1" />
                    <div class="rounded-lg p-2.5 bg-gray-200 border-2 border-gray-500 border-dashed">
                        <Cardboard class="block shadow-md">
                            <UserBadge class="px-2.5 py-2" use-fullname>
                                <UserAvatar class="h-12 w-12"
                                            clean-ring
                                            :fallback="{size: '32px'}"
                                            :avatar="avatar"
                                />
                            </UserBadge>
                            <img class="h-32" src="/images/user_banner_default.webp">
                        </Cardboard>
                    </div>
                </div>

                <div>
                    <Label value="Avatar" use-text="font-bold pb-1" />
                    <input type="file">
                </div>

                <div>
                    <Label value="Banner" use-text="font-bold pb-1" />
                    <input type="file">
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/inertia-vue3';
import Label from '@/Components/Form/Label.vue';
import Input from '@/Components/Form/Input.vue';
import TextArea from '@/Components/Form/TextArea.vue';
import Cardboard from '@/Components/Cardboard.vue';
import UserBadge from '@/Components/User/UserBadge.vue';
import Button from '@/Components/Form/Button.vue';
import UserAvatar from '@/Components/User/UserAvatar.vue';

const avatar = ref('');
const banner = ref('');
</script>
