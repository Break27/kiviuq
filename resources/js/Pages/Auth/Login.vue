<template>
    <auth-layout>
        <Head title="Log in" />

        <ValidationErrors class="mb-4" :errors="errors" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <BreezeCheckbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </BreezeButton>
            </div>
        </form>
    </auth-layout>
</template>

<script setup>
import ValidationErrors from '@/Components/Form/ValidationErrors.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";
import { ref } from 'vue';
import axios from 'axios';
import BreezeButton from '@/Components/Form/Button.vue';
import BreezeCheckbox from '@/Components/Form/Checkbox.vue';
import AuthLayout from '@/Layouts/Authenication.vue';
import BreezeInput from '@/Components/Form/Input.vue';
import BreezeLabel from '@/Components/Form/Label.vue';


defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = ref({
    email: '',
    password: '',
    remember: false,
    processing: false,
});

const errors = ref(null);
const api = axios.create();
api.defaults.withCredentials = true;

const submit = () => {
    //form.post(route('login'), {
    //    onFinish: () => form.reset('password'),
    //});
    form.value.processing = true;
    api.get('/sanctum/csrf-cookie')
    .then(() => {
        api.post(route('login'), form.value)
        .then(response => {
            Inertia.get(response.data.redirect);
        })
        .catch(error => {
            errors.value = error.response.data.errors;
        })
        .then(() => {
            form.value.password = '';
            form.value.processing = false;
        });
    });
};
</script>
