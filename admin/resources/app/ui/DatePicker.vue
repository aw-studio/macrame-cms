<template>
    <DatePicker
        v-bind="$attrs"
        v-slot="{ inputValue, inputEvents }"
        class="relative flex items-center space-x-2"
        is-dark
        :mode="withTime ? 'dateTime' : 'date'"
        is24hr
        color="orange"
        :disabled="disabled"
    >
        <!-- TODO: backport macrame -->
        <div class="flex-1">
            <Input
                :modelValue="inputValue"
                v-on="inputEvents"
                :errors="errors"
                :label="label"
                :disabled="disabled"
            />
        </div>
        <button
            @click="$emit('update:modelValue', null)"
            class="flex items-center justify-center w-6 h-6 text-white rounded-full bg-gray hover:bg-gray-800"
        >
            <IconCancel class="w-4 h-4" />
        </button>
    </DatePicker>
</template>

<script lang="ts" setup>
import { DatePicker } from 'v-calendar';
import 'v-calendar/dist/style.css';
import Input from './Form/Input.vue';
import IconCancel from './Icons/IconCancel.vue';

const props = defineProps({
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
    withTime: {
        type: Boolean,
        default: false,
    },
    errors: {
        type: Array,
        default: [],
    },
});
</script>
