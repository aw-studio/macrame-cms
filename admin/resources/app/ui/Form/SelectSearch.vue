<template>
    <Combobox
        v-slot="{ open }"
        v-if="itemLabel"
        :disabled="disabled"
        v-model="selectedItem"
    >
        <div class="relative w-full">
            <ComboboxInput
                :displayValue="(item: any) => ''"
                @change="query = $event.target.value"
                @focus="isFocused = true"
                @blur="isFocused = false"
                :disabled="disabled"
                class="px-[18px] mcr-select-input z-10 w-full transition-colors duration-200 bg-transparent focus:outline-none focus:input-focused text-indigo-900 py-[10px]"
                :class="{
                    'cursor-not-allowed': disabled,
                    'has-errors': errors?.length > 0 && !disabled,
                }"
            >
            </ComboboxInput>
            <div
                class="absolute top-0 left-0 right-0 flex w-full h-full max-w-full pointer-events-none"
            >
                <div
                    class="border-l input-section-1 border-t border-b border-gray-900 w-[16px] h-full rounded-l-[8px]"
                ></div>
                <div
                    class="relative h-full px-1 border-t border-b border-gray-900 input-width input-section-2"
                    :class="{
                        '!border-t-transparent': isFocused || selectedItem,
                        'border-t-gray-900': !isFocused && !selectedItem,
                    }"
                >
                    <label
                        class="relative inline-block text-sm transition duration-200 origin-left whitespace-nowrap will-change-auto h-fit top-1/2"
                        ref="inputLabel"
                        :class="{
                            'text-ellipsis !-translate-y-[35px] !scale-100 text-indigo-900':
                                selectedItem || isFocused,
                            'max-w-full -translate-y-[13px] scale-[1.34] text-gray-500':
                                !selectedItem && !isFocused,
                            '!text-red-signal':
                                selectedItem && errors?.length > 0 && !disabled,
                        }"
                    >
                        {{ label }}
                    </label>
                </div>
                <div
                    class="border-r border-t input-section-3 border-b focus:border-orange border-gray-900 flex-grow rounded-r-[8px] h-full"
                ></div>
            </div>
            <span
                v-if="selectedItem && query == ''"
                class="absolute inline-block truncate -translate-y-1/2 select-label-width whitespace-nowrap top-1/2 left-5"
            >
                {{ itemLabel }}
            </span>
            <ComboboxButton class="mcr-select-arrow" :disabled="disabled">
                <span
                    class="absolute inline-block -translate-y-1/2 top-1/2 right-5"
                >
                    <svg
                        class="transition-transform duration-200"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="-5 -8 24 24"
                        width="16"
                        fill="currentColor"
                    >
                        <path
                            d="M7.071 5.314l4.95-4.95a1 1 0 1 1 1.414 1.414L7.778 7.435a1 1 0 0 1-1.414 0L.707 1.778A1 1 0 1 1 2.121.364l4.95 4.95z"
                        ></path>
                    </svg>
                </span>
            </ComboboxButton>

            <transition
                leave-active-class="transition duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <ComboboxOptions
                    class="absolute top-full z-40 w-full mt-2 py-2.5 overflow-auto rounded-[8px] bg-white shadow max-h-48 focus:outline-none"
                >
                    <ComboboxOption
                        v-slot="{ active, selected }"
                        v-for="(item, key) in filteredItems"
                        :value="getItemValue(item)"
                        as="template"
                        :key="key"
                    >
                        <li
                            :class="[
                                selected ? 'bg-gray-100' : 'hover:bg-gray-100',
                                active ? 'bg-gray-100' : 'hover:bg-gray-100',
                                'cursor-pointer select-none relative',
                            ]"
                        >
                            <span
                                :class="[
                                    selected
                                        ? 'text-indigo-900'
                                        : 'text-gray-500',
                                    'block truncate py-[5px] px-4',
                                ]"
                            >
                                {{ getItemLabel(item) }}
                            </span>
                        </li>
                    </ComboboxOption>
                </ComboboxOptions>
            </transition>
        </div>
    </Combobox>
</template>

<script lang="ts" setup>
import { computed, watch, ref, PropType } from 'vue';
import {
    Combobox,
    ComboboxInput,
    ComboboxButton,
    ComboboxOptions,
    ComboboxOption,
} from '@headlessui/vue';

const emit = defineEmits(['update:modelValue', 'change']);

type SelectedType = string | number | boolean | Record<string, any> | undefined;

const props = defineProps({
    modelValue: {
        type: [String, Number, Boolean] as PropType<SelectedType>,
    },
    options: {
        type: Array as PropType<any[]>,
        required: true,
    },
    label: {
        type: String,
        default: null,
    },
    labelKey: {
        type: String,
        default: 'label',
    },
    valueKey: {
        type: String,
        default: 'value',
    },
    errors: {
        type: [Array, String],
        default: null,
    },
    placeholder: {
        type: String,
        default: 'Wählen Sie eine Option',
    },
    disabled: {
        type: Boolean,
        default: false,
    },
});

const isFocused = ref(false);

const getItemValue = (item: any) => {
    if (props.valueKey) {
        return item[props.valueKey];
    }
    return item;
};
const getItemLabel = (item: any) => {
    if (props.labelKey) {
        return item[props.labelKey];
    }
    return item;
};
const itemLabel = computed(() => {
    if (!props.modelValue) {
        return props.placeholder;
    }
    if (props.valueKey) {
        let selectedOption: any = props.options.find(
            (option: any) => option[props.valueKey] == props.modelValue
        );

        return selectedOption
            ? selectedOption[props.labelKey]
            : props.modelValue;
    }
    return props.modelValue;
});

const selectedItem = ref<SelectedType>(props.modelValue);
const query = ref('');

const filteredItems = computed(() =>
    query.value === ''
        ? props.options
        : props.options.filter(item =>
              item[props.labelKey]
                  .toLowerCase()
                  .replace(/\s+/g, '')
                  .includes(query.value.toLowerCase().replace(/\s+/g, ''))
          )
);

watch(selectedItem, () => {
    emit('update:modelValue', selectedItem.value);
    emit('change');
    query.value = '';
});
</script>

<style scoped>
.select-label-width {
    width: calc(100% - 60px);
}
.mcr-select-input:focus + div > .input-section-1 {
    border-color: #fead5e;
}
.mcr-select-input:focus + div > .input-section-2 {
    border-bottom-color: #fead5e;
    border-top-color: #fead5e;
}
.mcr-select-input:focus + div > .input-section-2 > label {
    color: #fead5e;
}
.mcr-select-input:focus + div > .input-section-3 {
    border-color: #fead5e;
}
.mcr-select-input:focus ~ .mcr-select-arrow {
    color: #fead5e;
}

.input-width {
    flex: 0 0 auto;
    max-width: calc(100% - 12px * 2);
}
.input-width-focused {
    max-width: calc(100% * 0.75);
}
.mcr-select-input.has-errors ~ .mcr-select-arrow {
    color: #f74b6d;
}
.mcr-select-input.has-errors + div > .input-section-1 {
    border-color: #f74b6d;
}
.mcr-select-input.has-errors + div > .input-section-2 {
    border-bottom-color: #f74b6d;
    border-top-color: #f74b6d;
    color: #f74b6d;
}
.mcr-select-input.has-errors + div > .input-section-3 {
    border-color: #f74b6d;
}
.mcr-select-input:disabled ~ .mcr-select-arrow {
    color: #afaeb9;
}
.mcr-select-input:disabled + div > .input-section-1 {
    border-color: #afaeb9;
}
.mcr-select-input:disabled + div > .input-section-2 {
    border-bottom-color: #afaeb9;
    border-top-color: #afaeb9;
    color: #afaeb9;
}
.mcr-select-input:disabled + div > .input-section-3 {
    border-color: #afaeb9;
}
</style>
