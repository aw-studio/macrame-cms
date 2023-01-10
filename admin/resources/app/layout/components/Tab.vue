<template>
    <router-link
        class="flex items-center px-3 py-1 text-sm tracking-widest text-black uppercase transition-colors duration-200 border-b border-transparent cursor-pointer focus:outline-none"
        exact-active-class="bg-gray-200 border-indigo-900"
        role="tab"
        :to="to"
    >
        <slot />
    </router-link>
</template>

<script setup lang="ts">
defineProps({
    to: {
        type: String,
        required: true,
    },
});
</script>
