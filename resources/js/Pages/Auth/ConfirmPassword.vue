<script setup>
import BreezeButton from '@/Components/Form/Button.vue';
import AuthLayout from '@/Layouts/Authenication.vue';
import BreezeInput from '@/Components/Form/Input.vue';
import BreezeLabel from '@/Components/Form/Label.vue';
import BreezeValidationErrors from '@/Components/Form/ValidationErrors.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    })
};
</script>

<template>
    <auth-layout>
        <Head title="Confirm Password" />

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <BreezeValidationErrors :errors="$page.props.errors"
                                class="mb-4"
        />

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </BreezeButton>
            </div>
        </form>
    </auth-layout>
</template>
