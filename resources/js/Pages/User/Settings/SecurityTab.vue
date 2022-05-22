<template>
    <Head title="Account" />

    <form>
        <div class="grid grid-cols-2">
            <div class="block space-y-4">
                <div>
                    <Label value="Username" use-text="font-bold pl-1.5" />
                    <InputWrapper class="flex w-full"
                                  child-basic="border border-l-0 rounded-r-md"
                                  child-focused="border-indigo-400"
                                  child-unfocused="border-gray-400">
                        <template #default>
                            <Input :class="['block w-full border-r-0 border-gray-400 focus:border-indigo-400 focus:ring-opacity-0 rounded-r-none', {'bg-gray-200': !changeable}]"
                                   type="text"
                                   :disabled="!changeable"
                                   :placeholder="$page.props.auth.user.username"
                                   :model-value="username"
                            />
                        </template>
                        <template #suffix>
                            <div :class="['flex h-full pr-3 rounded-r-md', {'bg-gray-200': !changeable}]">
                                <div :class="['transition-all duration-300 flex items-center', {'opacity-0': !changeable}]">
                                    <Icon>
                                        <CheckCircleRegular class="text-green-600" />
                                    </Icon>
                                </div>
                            </div>
                        </template>
                    </InputWrapper>
                </div>

                <div>
                    <Label value="Password" use-text="font-bold pl-1.5" />
                    <Input class="mt-1 w-full font-semibold"
                           use-border="border-gray-400"
                           id="password"
                           type="password" />
                </div>

                <div>
                    <Label value="New password" use-text="font-bold pl-1.5" />
                    <Input class="mt-1 w-full font-semibold"
                           use-border="border-gray-400"
                           id="new_password"
                           type="password" />
                </div>

                <div>
                    <Label value="Confirm new password" use-text="font-bold pl-1.5" />
                    <Input class="mt-1 w-full font-semibold"
                           use-border="border-gray-400"
                           id="new_password_confirmation"
                           type="password" />
                </div>

                <div>
                    <Button use-color="bg-blue-500 border border-transparent focus:outline-none focus:border-border-200 focus:shadow-outline-blue active:bg-blue-500 hover:bg-blue-400">
                        update
                    </Button>
                </div>
            </div>
            <div class="block space-y-4 px-3 py-6">
                <Button use-color="border border-transparent focus:outline-none focus:border-border-200 focus:shadow-outline-blue space-x-1"
                        use-padding="py-3 px-2"
                        :class="changeable ? 'bg-blue-300' : 'bg-blue-500 active:bg-blue-500 hover:bg-blue-400'"
                        @click="change"
                        fake>
                    <Icon><ExclamationTriangle /></Icon>
                    <span>change</span>
                </Button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { Icon } from '@vicons/utils';
import { CheckCircleRegular, ExclamationTriangle } from '@vicons/fa';
import InputWrapper from '@/Components/Form/InputWrapper';
import Label from '@/Components/Form/Label';
import Input from '@/Components/Form/Input';
import Button from "@/Components/Form/Button";

const changeable = ref(false);
const username = ref(usePage().props.value.auth.user.username);

const change = () => {
    changeable.value = true;
}
</script>
