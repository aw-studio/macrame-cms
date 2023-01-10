<template>
    <div
        class="relative flex flex-wrap gap-2 py-2.5 px-[18px] overflow-y-auto border rounded-sm max-h-[126px]"
        :class="{
            'border-red-signal': errors?.length > 0 || !!errors,
            'border-gray-900': errors?.length == 0 || !errors,
        }"
    >
        <div
            class="h-[30px] px-3 py-2 flex w-fit items-center gap-2 transition-colors bg-orange-100 focus:outline-none text-orange duration-200 rounded-full leading-none text-sm"
            v-for="(chip, i) in chips"
        >
            <span class="inline-block">
                {{ chip }}
            </span>
            <svg
                @click="deleteChip(i)"
                class="cursor-pointer"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="-6 -6 24 24"
                width="16"
                fill="currentColor"
            >
                <path
                    d="M7.314 5.9l3.535-3.536A1 1 0 1 0 9.435.95L5.899 4.485 2.364.95A1 1 0 1 0 .95 2.364l3.535 3.535L.95 9.435a1 1 0 1 0 1.414 1.414l3.535-3.535 3.536 3.535a1 1 0 1 0 1.414-1.414L7.314 5.899z"
                ></path>
            </svg>
        </div>
        <input
            type="text"
            class="w-full py-2.5 px-[18px] -my-2.5 -mx-[18px] bg-transparent text-base placeholder:text-gray-900 focus:outline-none"
            :placeholder="placeholder"
            v-model="currentInput"
            @keypress.enter="saveChip()"
            @keydown.delete="backspaceDelete()"
        />
    </div>
</template>

<script lang="ts" setup>
import { ref, watch } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Array,
        default: [],
    },
    placeholder: {
        type: String,
        default: 'Ihre Eingabe',
    },
    errors: {
        type: [Array, String],
        default: null,
    },
});

const chips = ref(props.modelValue);
const currentInput = ref('');

const saveChip = () => {
    if (currentInput.value.length == 0) {
        return;
    }
    if (chips.value.find((chip: any) => chip === currentInput.value)) {
        return;
    }
    chips.value.push(currentInput.value);

    currentInput.value = '';
};

const deleteChip = (index: number) => {
    chips.value.splice(index, 1);
};

const backspaceDelete = () => {
    currentInput.value === ''
        ? chips.value.splice(chips.value.length - 1)
        : chips.value;
};

watch(chips.value, () => {
    emit('update:modelValue', chips.value);
});
</script>
