<template>
    <component :is="expandable ? Disclosure : 'div'" defaultOpen>
        <section class="p-4 space-y-2">
            <component
                v-if="title"
                :is="expandable ? DisclosureButton : 'div'"
                v-slot="slot"
                class="flex items-center justify-between w-full mb-3 text-sm tracking-widest uppercase transition-opacity duration-500 delay-100 text-gray"
                :class="{
                    'opacity-100': expanded,
                    'opacity-0': !expanded,
                }"
            >
                <span class="inline-block px-4">
                    {{ title }}
                </span>
                <svg
                    v-if="expandable"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-5 -8 24 24"
                    width="24"
                    class="w-3 h-3 fill-gray-800"
                    :class="{ 'rotate-180': !slot?.open }"
                >
                    <path
                        d="M7.071 5.314l4.95-4.95a1 1 0 1 1 1.414 1.414L7.778 7.435a1 1 0 0 1-1.414 0L.707 1.778A1 1 0 1 1 2.121.364l4.95 4.95z"
                    ></path>
                </svg>
            </component>
            <component
                :is="expandable ? DisclosurePanel : 'div'"
                class="flex flex-col space-y-2"
            >
                <slot />
            </component>
        </section>
    </component>
</template>

<script lang="ts" setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';

const props = defineProps({
    title: {
        type: String,
        required: false,
    },
    expanded: {
        type: Boolean,
        default: false,
    },
    expandable: {
        type: Boolean,
        default: false,
    },
});
</script>
