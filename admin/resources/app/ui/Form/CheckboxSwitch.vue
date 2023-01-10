<template>
    <Switch
        :modelValue="modelValue"
        @update:modelValue="update"
        as="template"
        v-slot="{ checked }"
        class="focus:outline-none"
    >
        <div class="inline-flex items-center cursor-pointer">
            <div
                :class="
                    checked
                        ? 'bg-orange border-orange'
                        : 'bg-transparent border-indigo-900'
                "
                class="z-0 flex items-center justify-center flex-shrink-0 w-[18px] h-[18px] mr-2 border rounded-xs focus:outline-none focus:ring-2 focus:ring-gray-300"
            >
                <svg
                    :class="checked ? 'block' : 'hidden'"
                    class="z-0 w-2.5 h-2.5 text-gray-500 pointer-events-none fill-gray-500"
                    viewBox="0 0 17 12"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M16.576.414a1.386 1.386 0 010 1.996l-9.404 9.176A1.461 1.461 0 016.149 12c-.37 0-.74-.139-1.023-.414L.424 6.998a1.386 1.386 0 010-1.996 1.47 1.47 0 012.046 0l3.68 3.59L14.53.414a1.47 1.47 0 012.046 0z"
                        fill="#120F30"
                        fill-rule="nonzero"
                    />
                </svg>
            </div>
            <label class="pt-1 pl-2 cursor-pointer">
                <slot>
                    {{ label }}
                </slot>
            </label>
        </div>
    </Switch>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { Switch } from '@headlessui/vue';

import { getSize, sizes } from '../_props/size';
import { getVariant, variants } from '../_props/variant';

export default defineComponent({
    components: { Switch },
    props: {
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
    },
    setup({ disabled, ...props }, { emit }) {
        const size_ = getSize(props, {});
        const variant_ = getVariant(props, {});

        const update = (value: any) => {
            if (disabled) {
                return;
            }

            emit('update:modelValue', value);
        };

        return { update, size_, variant_ };
    },
});
</script>
