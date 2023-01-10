<template>
    <div
        class="sticky flex flex-col transition-all duration-300 bg-white shadow w"
        :class="{
            'w-[280px] 2xl:w-[400px]': open,
            'w-[60px]': !open,
        }"
    >
        <div class="flex-1 w-full overflow-y-auto">
            <div
                class="w-full p-4 cursor-pointer"
                :class="{
                    'border-b border-gray-400': open,
                }"
                @click="$emit('update:open', !open)"
                v-if="title || $slots.title"
            >
                <div
                    class="flex items-center w-full gap-4"
                    :class="{
                        'rotate-90 pl-6': !open,
                    }"
                >
                    <div
                        class="inline-flex items-center space-x-2 font-semibold"
                    >
                        <slot name="icon" />

                        <div>
                            <slot name="title">
                                {{ title }}
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="open">
                <slot />
            </div>
        </div>
        <div
            class="flex items-center w-full px-4 py-2 mt-auto border-t border-gray-400"
        >
            <button
                class="p-1 bg-gray-100 rounded"
                @click="$emit('update:open', !open)"
            >
                <svg
                    width="24"
                    height="24"
                    stroke-width="1.5"
                    fill="none"
                    class="transition-transform duration-300 scale-[0.8]"
                    :class="{
                        'rotate-180': open,
                        'rotate-0': !open,
                    }"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M18.5 12H6m0 0 6-6m-6 6 6 6"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>
<script lang="ts" setup>
const emit = defineEmits(['update:open']);

defineProps({
    open: {
        type: Boolean,
        default: true,
    },
    title: {
        type: String,
        default: null,
    },
});
</script>
