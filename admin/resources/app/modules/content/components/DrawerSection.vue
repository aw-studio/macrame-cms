<template>
    <div class="w-full py-4 border-b border-gray-400">
        <Disclosure v-slot="{ open }" defaultOpen>
            <DisclosureButton
                class="flex items-center justify-between w-full px-4 text-sm font-medium"
            >
                <div v-html="title"></div>
                <div
                    :class="{
                        'rotate-180': !open,
                    }"
                >
                    <IconNavArrowDown class="w-3 h-3" />
                </div>
            </DisclosureButton>

            <DisclosurePanel class="px-4 pt-3">
                <slot />
            </DisclosurePanel>
        </Disclosure>
    </div>
</template>
<script lang="ts" setup>
import IconNavArrowDown from '@/ui/Icons/IconNavArrowDown.vue';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
});
</script>
