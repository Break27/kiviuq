<template>
    <auth-layout>
        <Head title="Register" />

        <ValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="username" value="Username" />
                <InputWrapper child-basic="flex mt-1 border border-l-0 rounded-r-md items-center"
                              child-focused="border-indigo-300"
                              child-unfocused="border-gray-300">
                    <template #default>
                        <BreezeInput id="username" type="text"
                                     class="mt-1 block w-full border-r-0 focus:ring-opacity-0 rounded-r-none"
                                     v-model="form.username"
                                     required autofocus
                        />
                    </template>
                    <template #suffix>
                        <label class="pr-3 text-gray-600 text-opacity-75 pointer-events-none">
                            @{{ $page.props.app.domain }}
                        </label>
                    </template>
                </InputWrapper>
            </div>

            <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="email" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password_confirmation" value="Confirm Password" />
                <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>
                <BreezeButton :class="{ 'opacity-25': form.processing }"
                              :disabled="form.processing"
                              as="button"
                              class="ml-4">
                    Register
                </BreezeButton>
            </div>
        </form>
    </auth-layout>

    <Modal summon="portal" v-if="showGuide">
        <template #card-header>
            <span v-if="!finished" class="text-2xl">Almost There...</span>
            <span v-else class="text-2xl">All done!</span>
        </template>
        <template #card-body>
            <div class="pt-3">
                <div v-if="!finished">
                    <div class="flex">
                        <span class="text-xl text-gray-800">How would you like to be seen?</span>
                    </div>

                    <div class="flex w-full pt-3">
                        <BreezeInput class="block rounded-md w-full p-2 border border-gray-300 ring-opacity-5 focus:ring-1 focus:ring-indigo-200"
                               placeholder="Pick a nickname..."
                               v-model="updateForm.name"
                               required
                        />
                    </div>
                </div>
                <div v-else>
                    <div class="flex-col w-64">
                        <span class="flex justify-center text-green-600">
                            <CheckmarkCircleSharp class="inline-block w-32" />
                        </span>
                        <div class="flex justify-center">
                            <span class="text-xl text-gray-800 text-center">Complete!</span>
                        </div>
                        <div class="flex justify-center">
                            <span class="text-center">Redirect in 3 seconds...</span>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template #card-footer>
            <div class="float-right pt-3" v-if="!finished">
                <BreezeButton @click.prevent="update"
                              :class="{'opacity-25': updateForm.processing}"
                              :disabled="updateForm.processing"
                              as="button">
                    Confirm
                </BreezeButton>
            </div>
        </template>
    </Modal>
</template>

<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { CheckmarkCircleSharp } from "@vicons/ionicons5";
import InputWrapper from '@/Components/Form/InputWrapper.vue';
import BreezeButton from '@/Components/Form/Button.vue';
import AuthLayout from '@/Layouts/Authenication.vue';
import BreezeInput from '@/Components/Form/Input.vue';
import BreezeLabel from '@/Components/Form/Label.vue';
import ValidationErrors from '@/Components/Form/ValidationErrors.vue';
import Modal from '@/Components/Modal.vue';

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
    remain: true,
});

const updateForm = useForm({
    name: '',
    dest: '/',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
            if(!ValidationErrors.methods.hasErrors()) {
                showGuide.value = true;
            }
        },
    });
}

const update = () => {
    finished.value = true;
    setTimeout(() => {
        updateForm.post(route('profile'));
    }, 3000);
}

const showGuide = ref(false);
const finished = ref(false);
</script>
