<template>
    <router-link
        :to="to"
        active-class="bg-gray-50 bg-opacity-10"
        class="flex items-center h-[36px] flex-auto text-base font-light rounded group hover:bg-white hover:bg-opacity-10"
        :class="{
            '!bg-opacity-0': active === false,
        }"
    >
        <div
            v-if="$slots.icon"
            class="w-[44px] min-w-[44px] h-[44px] rounded flex items-center justify-center"
        >
            <slot name="icon" />
        </div>
        <div
            v-if="!hideTitle"
            class="flex-1 tracking-wider text-gray-100"
            :class="{
                'pl-3': !$slots.icon,
            }"
        >
            <slot>{{ title }}</slot>
        </div>
    </router-link>
</template>

<script lang="ts" setup>
const props = defineProps({
    title: {
        type: String,
        required: false,
    },
    to: {
        type: String,
        required: true,
    },
    hideTitle: {
        type: Boolean,
        default: false,
    },
    active: {
        type: Boolean,
        default: undefined,
    },
});
</script>
