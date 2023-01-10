<template>
    <div class="pb-5">
        <template v-if="!noLabel">
            <slot name="label">
                <FormFieldLabel :label="label" />
            </slot>
        </template>
        <div>
            <slot />
        </div>
        <div
            v-if="hint && !errors"
            class="mt-1 text-xs text-right text-gray-500"
        >
            {{ hint }}
        </div>
        <div class="flex flex-col mt-1 text-right" v-if="errors">
            <span
                v-for="(error, key) in errorList"
                :key="key"
                class="inline-block text-xs text-red"
            >
                {{ error }}
            </span>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import FormFieldLabel from './FormFieldLabel.vue';

const props = defineProps({
    label: {
        type: String,
    },
    errors: {
        type: [Array, String],
        default: null,
    },
    hint: {
        type: String,
    },
    noLabel: {
        type: Boolean,
        default: false,
    },
});

const errorList = computed(() => {
    if (!props.errors) {
        return [];
    }

    if (Array.isArray(props.errors)) {
        return props.errors;
    }

    return [props.errors];
});
</script>
