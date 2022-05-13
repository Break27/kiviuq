<template>
    <NavMenuItem class="flex-1 relative" no-flex>
        <input :class="classObject"
               @input="this.unfilled = this.keyword.length === 0"
               @focus="focused = true"
               @blur="focused = false"
               type="text"
               placeholder="Search..."
               v-model="keyword"
        />

        <div :class="classObject2">
            <div class="absolute inset-y-0 right-0 flex-1 items-center pointer-events-none">
                <Icon size="28">
                    <SearchCircle :class="{'opacity-0': !unfilled}" />
                </Icon>
            </div>
        </div>
    </NavMenuItem>
</template>

<script>
import { Icon } from '@vicons/utils';
import { SearchCircle } from "@vicons/ionicons5";
import NavMenuItem from '@/Components/Navigation/NavMenuItem.vue';

export default {
    data() {
        return {
            keyword: '',
            unfilled: true,
            focused: false,
            basic: `
                search-nav bg-opacity-100 placeholder-gray-500 placeholder-opacity-0 focus:placeholder-opacity-75
                border-0 focus:border-1 focus:border-gray-300 ring-0 focus:ring-1 focus:ring-gray-100
                focus:ring-opacity-50 rounded-md block bg-white float-right ease-in-out h-7
            `,
        }
    },
    computed: {
        empty() {
            return !this.focused && this.unfilled;
        },
        classObject() {
            return {
                [this.basic]: true,
                'w-7': this.empty,
                'w-full': !this.empty,
                'focus:bg-gray-200 shadow-md focus:shadow-sm': this.unfilled,
                'bg-gray-300 border-1': !this.unfilled,
            }
        },
        classObject2() {
            return {
                'flex transition-all ease-in-out duration-300': true,
                'opacity-0': !this.unfilled,
            }
        }
    },
    components: {
        NavMenuItem,
        SearchCircle,
        Icon,
    }
}


</script>

<style scoped>
.search-nav {
    transition-property: width, background-color, opacity;
    transition-duration: 200ms;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
