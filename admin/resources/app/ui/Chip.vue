<template>
    <button
        @click="update(!modelValue)"
        class="h-[30px] px-3 py-2 flex items-center gap-2 transition-colors focus:outline-none duration-200 rounded-full leading-none text-sm"
        :class="{
            'bg-gray-200 hover:bg-gray-300 text-gray-900 focus:bg-gray-300 active:bg-orange-100':
                !active,
            'bg-orange-100 text-orange-700': active,
            'bg-gray-100 text-gray-500 cursor-not-allowed': disabled,
        }"
        :disabled="disabled"
    >
        <span class="inline-flex whitespace-nowrap">
            <slot>
                {{ label }}
            </slot>
        </span>
    </button>
</template>

<script lang="ts" setup>
import { computed } from 'vue';

const props = defineProps({
    label: {
        type: String,
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    modelValue: {
        type: Boolean,
        default: false,
    },
    isActive: {
        type: Boolean,
        default: false,
    },
});
const emit = defineEmits(['update:modelValue']);

const update = (value: any) => {
    if (props.disabled) {
        return;
    }
    emit('update:modelValue', value);
};

const active = computed(() => {
    return props.isActive ? true : props.modelValue && !props.disabled;
});
</script>
