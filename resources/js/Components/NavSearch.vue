<template>
    <div class="relative">
        <input :class="classObject"
               @input="this.unfilled = this.keyword.length === 0"
               type="text"
               placeholder="Search..."
               v-model="keyword"
        />

        <div :class="classObject2">
            <div class="absolute inset-y-0 right-0 flex-1 items-center pointer-events-none">
                <Icon size="28">
                    <SearchCircleSharp />
                </Icon>
            </div>
        </div>
    </div>
</template>

<script setup>
import { SearchCircleSharp } from "@vicons/ionicons5";
import { Icon } from '@vicons/utils';

const basic = `border-0 focus:border-1 focus:border-gray-300 ring-0 focus:ring-1 focus:ring-gray-100
               focus:ring-opacity-50 rounded-md block bg-white search-nav float-right h-7 ease-in-out
               border-t-1 bg-opacity-100 placeholder-gray-500 placeholder-opacity-0 focus:placeholder-opacity-75
`;
</script>

<script>
export default {
    data() {
        return {
            keyword: '',
            unfilled: true
        }
    },
    computed: {
        classObject() {
            return {
                [this.basic]: true,
                'w-7 focus:w-64 focus:bg-gray-200 shadow-md focus:shadow-sm': this.unfilled,
                'w-64 bg-gray-300 border-1': !this.unfilled
            }
        },
        classObject2() {
            return {
                'flex transition-all ease-in-out duration-200': true,
                'opacity-0': !this.unfilled
            }
        },
    },
}


</script>

<style scoped>
.search-nav {
    transition-property: width, background-color, opacity;
    transition-duration: 200ms;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
