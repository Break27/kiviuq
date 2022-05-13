<template>
    <Head title="Home" />

    <Gatekeeper>
        <template #default>

            <Cardboard class="p-6 w-full">
                <template #default>
                    <p>THIS IS THE HOME PAGE!</p>

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ultrices eros in cursus turpis massa tincidunt dui ut. Gravida arcu ac tortor dignissim convallis aenean. Cursus eget nunc scelerisque viverra. Tellus integer feugiat scelerisque varius morbi. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Nulla posuere sollicitudin aliquam ultrices sagittis. Sed euismod nisi porta lorem mollis aliquam. Elit sed vulputate mi sit. Est velit egestas dui id ornare. Massa tempor nec feugiat nisl pretium. Lacus sed viverra tellus in hac habitasse platea dictumst.

                    Posuere morbi leo urna molestie at elementum eu facilisis. Risus quis varius quam quisque id. Risus commodo viverra maecenas accumsan. Amet porttitor eget dolor morbi non arcu risus quis. Gravida in fermentum et sollicitudin ac. Vulputate sapien nec sagittis aliquam. Aliquet lectus proin nibh nisl condimentum id. Pretium fusce id velit ut. At varius vel pharetra vel turpis nunc. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Suscipit tellus mauris a diam maecenas sed enim ut. Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat. Vel fringilla est ullamcorper eget nulla facilisi etiam. Malesuada fames ac turpis egestas integer eget. Odio ut sem nulla pharetra diam sit. Facilisis sed odio morbi quis commodo odio aenean sed adipiscing.

                    Tincidunt vitae semper quis lectus nulla at. Laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Massa eget egestas purus viverra. Pharetra diam sit amet nisl. Cursus eget nunc scelerisque viverra. Eget nunc lobortis mattis aliquam. Massa massa ultricies mi quis hendrerit dolor magna eget. Elit eget gravida cum sociis. Fringilla ut morbi tincidunt augue. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam. Semper risus in hendrerit gravida rutrum quisque non tellus orci. Venenatis a condimentum vitae sapien pellentesque. Diam vulputate ut pharetra sit amet aliquam. Felis bibendum ut tristique et egestas. Sed lectus vestibulum mattis ullamcorper velit. Pellentesque nec nam aliquam sem et tortor consequat id porta. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Ac turpis egestas sed tempus urna. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed.

                    Faucibus vitae aliquet nec ullamcorper sit. Tristique magna sit amet purus gravida quis blandit. Dignissim convallis aenean et tortor. Lorem ipsum dolor sit amet consectetur adipiscing elit. Turpis egestas maecenas pharetra convallis posuere. Varius sit amet mattis vulputate enim nulla aliquet porttitor lacus. Pretium fusce id velit ut tortor. Dui accumsan sit amet nulla facilisi. Mauris a diam maecenas sed enim ut sem. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Massa sapien faucibus et molestie ac feugiat sed.

                    Senectus et netus et malesuada fames ac turpis egestas. Vulputate mi sit amet mauris commodo. Maecenas pharetra convallis posuere morbi leo urna molestie. Tellus in hac habitasse platea dictumst vestibulum rhoncus. At quis risus sed vulputate odio ut enim blandit. Magna eget est lorem ipsum dolor sit amet consectetur. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. Hendrerit dolor magna eget est lorem. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Donec enim diam vulputate ut pharetra sit amet aliquam id. Turpis cursus in hac habitasse platea dictumst quisque. Purus faucibus ornare suspendisse sed. Fusce id velit ut tortor pretium viverra suspendisse. Egestas congue quisque egestas diam in arcu. Turpis egestas integer eget aliquet nibh. Nibh nisl condimentum id venenatis. Id eu nisl nunc mi.

                    <Button @click="Modal.methods.showModal('portal')" type="button" class="bg-gray-300">
                        <span>Button</span>
                    </Button>

                    <Modal>
                        <template #control>
                            <Button @click="Modal.methods.dismiss()" class="bg-white text-red-600">
                                CLOSE
                            </Button>
                        </template>
                        <template #card-header>
                            <span v-if="false" class="text-2xl">Almost There...</span>
                            <span v-else class="text-2xl">All done!</span>
                        </template>
                        <template #card-body>
                            <div v-if="false" class="flex flex-col pt-3">
                                <div class="flex">
                                    <span class="text-xl text-gray-800">How would you like to be seen?</span>
                                </div>

                                <div class="flex w-full pt-3">
                                    <Input class="block rounded-md w-full p-3 border border-gray-300 ring-opacity-5 focus:ring-1 focus:ring-indigo-200"
                                           placeholder="Pick a nickname..."
                                           required
                                    />
                                </div>
                            </div>
                            <div v-else>
                                <div class="flex-col">
                                    <span class="flex justify-center text-green-600">
                                        <CheckmarkCircleSharp class="inline-block w-32" />
                                    </span>
                                            <div class="flex justify-center">
                                                <span class="text-xl text-gray-800 text-center">Complete!</span>
                                            </div>
                                            <span class="flex justify-center">
                                <span class="text-center">Redirect in 3 seconds...</span>
                            </span>
                                        </div>
                                    </div>
                            </template>
                        <template #card-footer>
                            <span class="float-right" v-if="false">
                                <Button class="bg-gray-800" as="button">
                                    Confirm
                                </Button>
                            </span>
                        </template>
                    </Modal>
                </template>
            </Cardboard>
        </template>
    </Gatekeeper>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Gatekeeper from "@/Layouts/Gatekeeper.vue";
import Cardboard from '@/Components/Cardboard.vue';
import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Form/Button.vue';

import Input from '@/Components/Form/Input.vue';
import { CheckmarkCircleSharp } from "@vicons/ionicons5";
import UserAvatar from "@/Components/User/UserAvatar";
</script>
