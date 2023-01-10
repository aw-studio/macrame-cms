<template>
    <div
        class="flex items-center h-full max-w-sm mb-6 overflow-hidden text-gray-800 border border-gray-500 rounded focus-within:text-blue"
    >
        <div
            class="flex items-center justify-center w-10 h-10 text-gray-800 bg-gray-300"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="-2.5 -2.5 24 24"
                width="16"
                height="16"
                preserveAspectRatio="xMinYMin"
                class="fill-gray-800 icon__icon"
            >
                <path
                    d="M8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12zm6.32-1.094l3.58 3.58a1 1 0 1 1-1.415 1.413l-3.58-3.58a8 8 0 1 1 1.414-1.414z"
                ></path>
            </svg>
        </div>
        <input
            v-model.debounce="table.search"
            class="w-full h-full pl-6 text-gray-800 bg-transparent outline-none placeholder:text-gray-500"
            :placeholder="placeholder"
        />
    </div>
</template>

<script lang="ts" setup>
import { PropType } from 'vue';
import { Index } from '@macramejs/macrame-vue3';

defineProps({
    table: {
        type: Object as PropType<Index>,
        required: true,
    },
    placeholder: {
        type: String,
    },
});
</script>
