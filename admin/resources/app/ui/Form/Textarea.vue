<template>
    <div class="relative">
        <textarea
            v-bind="$attrs"
            :id="id"
            :disabled="disabled"
            @focus="focused = true"
            @blur="focused = false"
            :value="modelValue"
            @input="updateValue"
            rows="4"
            class="px-[18px] z-10 w-full transition-colors duration-200 bg-transparent resize-none focus:outline-none focus:textarea-focused text-indigo-900 py-2.5"
            :class="{
                'cursor-not-allowed': disabled,
                'has-errors': errors.length > 0 && !disabled,
            }"
        />
        <div
            class="absolute top-0 left-0 right-0 flex w-full h-full max-w-full pointer-events-none"
        >
            <div
                class="border-l textarea-section-1 border-t border-b border-gray-900 w-[16px] h-full rounded-l-[8px]"
            ></div>
            <div
                class="relative h-full px-1 border-t border-b border-gray-900 textarea-width textarea-section-2"
                :class="{
                    '!border-t-transparent':
                        (modelValue?.length > 0 && label) || (focused && label),
                    'border-t-gray-900': modelValue?.length == 0 || !modelValue,
                }"
            >
                <label
                    class="relative inline-block text-sm transition duration-200 origin-left whitespace-nowrap will-change-auto h-fit top-[20px]"
                    :class="{
                        'text-ellipsis !-translate-y-[35px] !scale-100 text-indigo-900':
                            modelValue?.length > 0 || focused,
                        'max-w-full -translate-y-[13px] scale-[1.34] text-gray-900':
                            modelValue?.length == 0 || !modelValue,
                        '!text-red-signal':
                            (modelValue?.length > 0 &&
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
                class="border-r border-t textarea-section-3 border-b focus:border-orange border-gray-900 flex-grow rounded-r-[8px] h-full"
            ></div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';

const emits = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    errors: {
        type: Array,
        default: [],
    },
    hint: {
        type: String,
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    label: {
        type: String,
        default: null,
    },
});

const focused = ref(false);

const id = `mcr-textarea-${Math.random() * 1000000}`;

const updateValue = (event: any) => {
    emits('update:modelValue', event.target.value);
};
</script>

<style scoped>
textarea:focus + div > .textarea-section-1 {
    border-color: #fead5e;
}
textarea:focus + div > .textarea-section-2 {
    border-bottom-color: #fead5e;
    border-top-color: #fead5e;
}
textarea:focus + div > .textarea-section-2 > label {
    color: #fead5e;
}
textarea:focus + div > .textarea-section-3 {
    border-color: #fead5e;
}

.textarea-width {
    flex: 0 0 auto;
    max-width: calc(100% - 12px * 2);
}
.textarea-width-focused {
    max-width: calc(100% * 0.75);
}
textarea.has-errors + div > .textarea-section-1 {
    border-color: #f74b6d;
}
textarea.has-errors + div > .textarea-section-2 {
    border-bottom-color: #f74b6d;
    border-top-color: #f74b6d;
}
textarea.has-errors + div > .textarea-section-3 {
    border-color: #f74b6d;
}
textarea:disabled + div > .textarea-section-1 {
    border-color: #afaeb9;
}
textarea:disabled + div > .textarea-section-2 {
    border-bottom-color: #afaeb9;
    border-top-color: #afaeb9;
}
textarea:disabled + div > .textarea-section-2 > label {
    color: #afaeb9;
}
textarea:disabled + div > .textarea-section-3 {
    border-color: #afaeb9;
}
</style>
