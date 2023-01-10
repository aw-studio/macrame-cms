<template>
    <div
        class="flex bg-white cursor-pointer hover:ring-2"
        :class="{
            'hover:ring-purple ': color as any  == 'purple',
            'hover:ring-green ': color as any  == 'green',
            'hover:ring-orange ': color as any  == 'orange',
            'hover:ring-red ': color as any  == 'red',
            'hover:ring-blue ': color as any  == 'blue',
            'pointer-events-none p-2 rounded': preview,
            'mb-3 rounded-xs': !preview
        }"
    >
        <div
            class="flex items-center justify-center w-12 h-auto mr-3 bg-opacity-10 rounded-xs"
            :class="{
                'text-purple bg-purple ': color as any  == 'purple',
                'text-green bg-green ': color as any  == 'green',
                'text-orange bg-orange ': color as any  == 'orange',
                'text-red bg-red ': color as any  == 'red',
                'text-blue bg-blue ': color as any == 'blue',
            }"
        >
            <slot />
        </div>
        <div class="text-sm font-medium">
            {{ title }}
            <div
                class="-mt-[2px] text-sm font-normal text-gray"
                v-if="hint"
                v-html="hint"
            ></div>
        </div>
    </div>
</template>
<script lang="ts" setup>
defineProps({
    color: {
        type: String,
        default: 'purple',
    },
    title: {
        type: String,
        required: true,
    },
    hint: {
        type: String,
        default: null,
    },
    preview: {
        type: Boolean,
        default: false,
    },
});
</script>
