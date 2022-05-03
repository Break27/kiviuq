<template>
    <auth-layout>
        <Head title="Register" />

        <BreezeValidationErrors class="mb-4" />

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
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </BreezeButton>
            </div>
        </form>
    </auth-layout>
</template>

<script setup>
import BreezeButton from '@/Components/Auth/BreezeButton.vue';
import AuthLayout from '@/Layouts/Authenication.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import InputWrapper from '@/Components/InputWrapper.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
