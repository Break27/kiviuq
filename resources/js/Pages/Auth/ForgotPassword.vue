<template>
    <auth-layout>
        <Head title="Forgot Password" />

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <BreezeValidationErrors :errors="$page.props.errors"
                                class="mb-4"
        />

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </BreezeButton>
            </div>
        </form>
    </auth-layout>
</template>

<script lang="ts" setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import route from 'ziggy-js';

import BreezeValidationErrors from '@/Components/Form/ValidationErrors.vue';
import BreezeButton from '@/Components/Form/Button.vue';
import AuthLayout from '@/Layouts/Authenication.vue';
import BreezeInput from '@/Components/Form/Input.vue';
import BreezeLabel from '@/Components/Form/Label.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>
