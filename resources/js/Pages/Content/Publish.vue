<template>
    <common-layout>
        <Cardboard class="p-2">
            <div class="flex flex-1 flex-col space-y-2">
                <div class="flex">
                    <textarea class="w-full"
                              v-model="content"
                    />
                </div>
                <div class="flex justify-end">
                    <Button :class="{'opacity-25': processing}"
                            :disabled="processing"
                            @click.prevent="publish">
                        publish
                    </Button>
                </div>
            </div>
        </Cardboard>
    </common-layout>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import CommonLayout from '@/Layouts/Common.vue';
import Cardboard from '@/Components/Cardboard';
import Button from '@/Components/Form/Button';

const content = ref(null);
const processing = ref(false);

const api = axios.create();
api.defaults.withCredentials = true;

const publish = () => {
    processing.value = true;

    api.post('/api/v1/posts', {
        postContent: content.value,
    })
    .then(function(response) {
        console.log(response);
    })
    .catch(function(error) {
        console.log(error);
    })
    .then(function() {
        processing.value = false;
    });
}
</script>
