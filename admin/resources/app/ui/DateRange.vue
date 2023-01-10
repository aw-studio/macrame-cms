<template>
    <DatePicker
        v-bind="$attrs"
        :columns="2"
        is-range
        is-dark
        :disabled="disabled"
        color="orange"
        class="z-10 w-full"
    >
        <template v-slot="{ inputValue, inputEvents }">
            <div class="flex items-center justify-center w-full">
                <div class="relative w-full">
                    <Input
                        :modelValue="inputValue.start"
                        :errors="errors"
                        :disabled="disabled"
                        v-on="inputEvents.start"
                        label="Start"
                    />
                </div>
                <svg
                    class="w-4 h-4 mx-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3"
                    />
                </svg>
                <div class="relative w-full">
                    <Input
                        :modelValue="inputValue.end"
                        :errors="errors"
                        :disabled="disabled"
                        v-on="inputEvents.end"
                        label="Ende"
                    />
                </div>
            </div>
        </template>
    </DatePicker>
</template>

<script lang="ts" setup>
import { DatePicker } from 'v-calendar';
import 'v-calendar/dist/style.css';
import Input from './Form/Input.vue';

defineProps({
    label: {
        type: String,
        default: null,
    },
    hint: {
        type: String,
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    errors: {
        type: Array,
        default: [],
    },
});
</script>
