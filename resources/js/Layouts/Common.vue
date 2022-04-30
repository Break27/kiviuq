<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <div class="fixed top-0 w-full">
                <nav class="bg-white border-b border-gray-100">
                    <!-- Primary Navigation Menu -->
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-10">
                            <div class="flex space-x-2.5">
                                <!-- Logo -->
                                <NavBrand :href="route('about')" :name="appName">
                                    <BreezeApplicationLogo class="block h-8 w-auto" />
                                </NavBrand>

                                <!-- Navigation Links -->
                                <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                                    <slot name="navLinks" />
                                </div>
                            </div>

                            <div class="hidden items-center sm:flex sm:ml-6">
                                <!-- Search -->
                                <div class="ml-3 relative">
                                    <BreezeInput id="search" type="text" class="block float-right w-7 h-7 transition duration-200 ease-in-out focus:w-full" v-model="form.search" />
                                </div>
                                <!-- Settings Dropdown -->
                                <!--
                                <div class="ml-3 relative">
                                    <BreezeDropdown align="right" width="48">
                                        <template #trigger>
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>

                                        <template #content>
                                            <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                                Log Out
                                            </BreezeDropdownLink>
                                        </template>
                                    </BreezeDropdown>
                                </div>
                                -->
                            </div>

                            <!-- Hamburger -->
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Responsive Navigation Menu -->
                    <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <slot name="navLinks" />
                        </div>

                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800"><!--{{ $page.props.auth.user.name }}--></div>
                                <div class="font-medium text-sm text-gray-500"><!--{{ $page.props.auth.user.name }}--></div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </BreezeResponsiveNavLink>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Page Content -->
            <main class="flex justify-center pt-16">
                <div class="flex max-w-6xl gap-2 w-full px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 w-full">
                        <Cardboard>
                            <template #default>
                                THIS IS TOOLTIP LEFT
                            </template>
                        </Cardboard>
                    </div>
                    <div class="flex-shrink-0 w-1/2 top-0">
                        <slot />
                    </div>
                    <div class="flex-1 w-full">
                        <Cardboard>
                            <template #default>
                                THIS IS TOOLTIP RIGHT
                            </template>
                        </Cardboard>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import BreezeInput from '@/Components/Input.vue';
import NavBrand from "@/Components/NavBrand";
import { appName } from '@/app.js';
import Cardboard from "@/Components/Cardboard";

const showingNavigationDropdown = ref(false);
const form = useForm({
    'search': '',
});
</script>
