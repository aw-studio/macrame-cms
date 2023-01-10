<template>
    <RadioGroup
        :modelValue="modelValue"
        @update:modelValue="$emit('update:modelValue', $event)"
    >
        <!-- <RadioGroupLabel>Plan</RadioGroupLabel> -->
        <RadioGroupOption
            as="template"
            class="mb-3 rounded focus:outline-none max-w-max focus:ring-4 focus:ring-orange-100"
            v-for="option in options"
            :key="optionValue(option)"
            v-slot="{ checked, disabled }"
            :value="optionValue(option)"
            :disabled="isDisabled(option)"
        >
            <div class="flex gap-2">
                <div class="flex">
                    <div
                        class="flex items-center justify-center bg-white w-[18px] h-[18px] border rounded-lg"
                        :class="{
                            'border-orange': checked && !disabled,
                            'border-indigo-900': !checked && !disabled,
                            'border-gray-500': disabled,
                        }"
                    >
                        <div
                            class="w-2.5 h-2.5 rounded-full"
                            :class="{
                                'bg-orange': checked,
                                'bg-white': !checked,
                            }"
                        ></div>
                    </div>
                </div>
                <RadioGroupLabel
                    as="p"
                    class="flex-1 mt-0.5 leading-none cursor-pointer"
                    :class="{ 'text-gray-500': disabled }"
                >
                    {{ optionLabel(option) }}
                </RadioGroupLabel>
            </div>
        </RadioGroupOption>
    </RadioGroup>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue';

export default defineComponent({
    components: { RadioGroup, RadioGroupLabel, RadioGroupOption },
    props: {
        labelKey: {
            type: String,
            default: null,
        },
        valueKey: {
            type: String,
            default: null,
        },
        disabledKey: {
            type: String,
            default: null,
        },
        options: {
            type: Array,
            default: () => [],
        },
        modelValue: {
            type: [String, Number],
            default: null,
        },
    },

    setup(props, { attrs }) {
        const optionValue = (option: any) => {
            if (props.valueKey === null) {
                return option;
            }

            return option[props.valueKey];
        };

        const optionLabel = (option: any) => {
            if (props.labelKey === null) {
                return option;
            }

            return option[props.labelKey];
        };

        const isDisabled = (option: any) => {
            if (props.disabledKey === null) {
                return false;
            }

            return option[props.disabledKey] == true;
        };

        return { optionValue, optionLabel, isDisabled };
    },
});
</script>
