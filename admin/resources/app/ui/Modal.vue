<template>
    <TransitionRoot appear :show="open" as="template">
        <Dialog as="div" :open="open">
            <div class="fixed inset-0 z-50 overflow-y-auto">
                <div class="min-h-screen px-4 text-center">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0"
                        enter-to="opacity-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100"
                        leave-to="opacity-0"
                    >
                        <DialogOverlay
                            class="fixed inset-0 bg-gray-800 bg-opacity-75 backdrop-filter backdrop-blur-sm"
                            @click="close(true)"
                        />
                    </TransitionChild>

                    <span
                        class="inline-block h-screen align-middle"
                        aria-hidden="true"
                    >
                        &#8203;
                    </span>

                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <div
                            class="inline-block w-full p-6 my-8 text-left align-middle transition-all transform bg-white rounded shadow-xl"
                            :class="{
                                'max-w-full': !size_,
                                'max-w-3xl': size_ == 'lg',
                                'max-w-2xl': size_ == 'md',
                                'max-w-xl': size_ == 'sm',
                            }"
                        >
                            <DialogTitle
                                as="h3"
                                class="flex items-center justify-between pb-6 text-lg font-bold"
                                v-if="title || localize"
                            >
                                <div>
                                    {{ title }}
                                </div>
                                <SelectLocale v-if="localize" />
                            </DialogTitle>
                            <slot />
                            <div class="flex justify-end pt-6 space-x-3">
                                <slot name="footer" />
                            </div>
                        </div>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
} from '@headlessui/vue';
import { getSize, sizes } from './_props/size';
import SelectLocale from '@/modules/localize/SelectLocale.vue';

const emit = defineEmits(['close', 'update:open']);
const props = defineProps({
    open: {
        type: Boolean,
        default: false,
    },
    title: {
        type: [String, Number],
        default: null,
    },
    localize: {
        type: Boolean,
        default: false,
    },
    ...sizes,
});

const size_ = getSize(props, {});

const close = (closing: boolean) => {
    emit('close', closing);
    emit('update:open', !closing);
};

const closeHandler = (evt: KeyboardEvent) => {
    if (evt.key == 'Escape') {
        close(true);
    }
};

onMounted(() => {
    document.addEventListener('keyup', closeHandler);
});
</script>
