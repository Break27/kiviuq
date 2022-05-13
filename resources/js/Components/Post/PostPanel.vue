<template>
    <Cardboard>
        <div class="flex">
            <div class="flex flex-col bg-gray-200">

            </div>
            <div class="flex flex-1 p-2">
                <div class="grid grid-cols-1">
                    <div>
                        <UserAvatar class="h-10 w-10"
                                    :fallback="{size: '32px'}"
                                    :user="''"
                        />
                        <span></span>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </Cardboard>
</template>

<script setup>
import Cardboard from '@/Components/Cardboard.vue';
import UserAvatar from '@/Components/User/UserAvatar.vue';
</script>
