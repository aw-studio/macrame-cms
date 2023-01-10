<template>
    <SwitchGroup>
        <div class="inline-flex flex-col">
            <SwitchLabel class="mr-4" v-if="label || $slots.default">
                <slot> {{ label }} </slot>
            </SwitchLabel>
            <Switch
                :modelValue="modelValue"
                @update:modelValue="update"
                :class="{
                    'bg-gray-500': !modelValue,
                    'bg-green':
                        (variant_ == null && modelValue) ||
                        (variant_ == 'primary' && modelValue),

                    'bg-orange':
                        (variant_ == null && modelValue) ||
                        (variant_ == 'orange' && modelValue),

                    'text-lg': size_ == 'lg',
                    'text-base': size_ == 'md' || size_ == null,
                    'text-xs': size_ == 'sm',

                    'w-16': size_ == 'lg',
                    'w-[35px]': size_ == 'md' || size_ == null,
                    'w-8': size_ == 'sm',

                    'h-8 rounded-lg': size_ == 'lg',
                    'h-[18px] rounded-md': size_ == 'md' || size_ == null,
                    'h-4 rounded-sm': size_ == 'sm',

                    'bg-gray-400 focus:!ring-transparent': disabled,
                }"
                class="relative inline-flex items-center transition-all rounded-full focus:outline-none focus:ring-4 focus:ring-orange-100"
            >
                <span
                    :class="{
                        'w-[26px] h-[26px]': size_ == 'lg',
                        'w-3.5 h-3.5': size_ == 'md',
                        'w-2.5 h-2.5': size_ == 'sm',

                        'translate-x-[34px]': size_ == 'lg' && modelValue,
                        'translate-x-[4px]':
                            (size_ == 'md' && !modelValue) ||
                            ('lg' && !modelValue),
                        'translate-x-[19px]': size_ == 'md' && modelValue,
                        'translate-x-1': size_ == 'sm' && !modelValue,
                        'translate-x-[18px]': size_ == 'sm' && modelValue,
                    }"
                    class="inline-block transition-all transform bg-white rounded-full"
                />
            </Switch>
        </div>
    </SwitchGroup>
</template>

<script lang="ts" setup>
import { Switch, SwitchGroup, SwitchLabel } from '@headlessui/vue';
import { getSize, sizes } from '../_props/size';
import { getVariant, variants } from '../_props/variant';

const emit = defineEmits(['update:modelValue']);

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
    ...sizes,
    ...variants,
});

const size_ = getSize(props, {});
const variant_ = getVariant(props, {});

const update = (value: any) => {
    if (props.disabled) {
        return;
    }
    emit('update:modelValue', value);
};
</script>
