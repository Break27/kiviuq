<template>
    <input type="text" @input="this.unfilled = this.keyword.length === 0" :class="classObject" placeholder="Search..." v-model="keyword" />
</template>

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
                'border-0 focus:border-1 focus:border-gray-300 ring-0 focus:ring-1 focus:ring-gray-100 focus:ring-opacity-50 rounded-md': true,
                'block bg-white search-nav bg-right bg-opacity-50 bg-no-repeat bg-origin-padding float-right h-7': true,
                'placeholder-gray-500 placeholder-opacity-0 focus:placeholder-opacity-75 ease-in-out border-t-1': true,

                'w-7 focus:w-64 focus:bg-gray-200 shadow-md focus:shadow-sm': this.unfilled,
                'w-64 bg-gray-300 border-1': !this.unfilled
            }
        }
    },
}
</script>

<style scoped>
.search-nav {
    /* @heroicons/vue/outline search-circle */
    background-image: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" /> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z" clip-rule="evenodd" /> </svg>');

    transition-property: width, background-color, opacity;
    transition-duration: 200ms;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
