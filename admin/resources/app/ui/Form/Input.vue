<template>
    <div class="relative">
        <BaseInput
            v-bind="$attrs"
            :id="id"
            :disabled="disabled"
            @focus="focused = true"
            @blur="focused = false"
            class="px-[18px] z-10 w-full transition-colors duration-200 bg-transparent focus:outline-none focus:input-focused text-indigo-900 py-2.5"
            :class="{
                'cursor-not-allowed': disabled,
                'has-errors': errors.length > 0 && !disabled,
            }"
        />
        <div
            class="absolute top-0 left-0 right-0 flex w-full h-full max-w-full pointer-events-none"
        >
            <div
                class="border-l input-section-1 border-t border-b border-gray-900 w-[16px] h-full rounded-l-[8px]"
            ></div>
            <div
                class="relative h-full px-1 border-t border-b border-gray-900 input-width input-section-2"
                :class="{
                    '!border-t-transparent':
                        (($attrs.modelValue as string)?.length > 0 && label) ||
                        (focused && label),
                    'border-t-gray-900':
                        ($attrs.modelValue as string)?.length == 0 || !$attrs.modelValue,
                }"
            >
                <label
                    class="relative inline-block text-sm transition duration-200 origin-left whitespace-nowrap will-change-auto h-fit top-1/2"
                    :class="{
                        'text-ellipsis !-translate-y-[35px] !scale-100 text-indigo-900':
                            ($attrs.modelValue as string)?.length > 0 || focused,
                        'max-w-full -translate-y-[13px] scale-[1.34] text-gray-900':
                            ($attrs.modelValue as string)?.length == 0 ||
                            !$attrs.modelValue,
                        '!text-red-signal':
                            (($attrs.modelValue as string)?.length > 0 &&
                                errors.length > 0 &&
                                !disabled) ||
                            (focused && errors.length > 0 && !disabled),
                    }"
                    :for="id"
                >
                    {{ label }}
                </label>
            </div>
            <div
                class="border-r border-t input-section-3 border-b focus:border-orange border-gray-900 flex-grow rounded-r-[8px] h-full"
            ></div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Input as BaseInput } from '@macramejs/macrame-vue3';

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
        type: [String, Array],
        default: [],
    },
});

const focused = ref(false);

const id = `mcr-input-${Math.random() * 1000000}`;
</script>

<script lang="ts">
export default {
    inheritAttrs: false,
    customOptions: {},
};
</script>

<style scoped>
input:focus + div > .input-section-1 {
    border-color: #fead5e;
}
input:focus + div > .input-section-2 {
    border-bottom-color: #fead5e;
    border-top-color: #fead5e;
}
input:focus + div > .input-section-2 > label {
    color: #fead5e;
}
input:focus + div > .input-section-3 {
    border-color: #fead5e;
}

.input-width {
    flex: 0 0 auto;
    max-width: calc(100% - 12px * 2);
}
.input-width-focused {
    max-width: calc(100% * 0.75);
}
input.has-errors + div > .input-section-1 {
    border-color: #f74b6d;
}
input.has-errors + div > .input-section-2 {
    border-bottom-color: #f74b6d;
    border-top-color: #f74b6d;
}
input.has-errors + div > .input-section-3 {
    border-color: #f74b6d;
}
input:disabled + div > .input-section-1 {
    border-color: #afaeb9;
}
input:disabled + div > .input-section-2 {
    border-bottom-color: #afaeb9;
    border-top-color: #afaeb9;
}
input:disabled + div > .input-section-2 > label {
    color: #afaeb9;
}
input:disabled + div > .input-section-3 {
    border-color: #afaeb9;
}
</style>
