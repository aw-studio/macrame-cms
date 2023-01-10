<template>
    <component
        :is="as"
        :href="href"
        :class="{
            // primary
            'bg-white bg-opacity-10 hover:text-orange': isActive && !secondary,
            'h-[44px]': !secondary,
            // secondary
            'items-center h-[36px] flex-auto': secondary,
            'bg-gray-50 bg-opacity-10': isActive && secondary,
        }"
        class="flex items-center text-base font-light transition-opacity duration-500 delay-100 rounded cursor-pointer group hover:bg-white hover:bg-opacity-10"
    >
        <div
            v-if="$slots.icon"
            class="w-[44px] min-w-[44px] h-[44px] rounded flex items-center justify-center"
            :class="{
                ' text-orange': isActive && !secondary,
                ' text-gray-100': !isActive,
                'max-w-[44px]': hideTitle,
            }"
        >
            <slot name="icon" />
        </div>
        <transition
            enter-active-class="transition duration-500"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition duration-500"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="!hideTitle"
                class="flex-1 pl-3 tracking-wider text-gray-100 delay-[160ms]"
                :class="{
                    'group-hover:text-orange': isActive && !secondary,
                }"
            >
                <slot />
            </div>
        </transition>
    </component>
</template>

<script lang="ts" setup>
import { computed } from 'vue';

const props = defineProps({
    href: {
        type: String,
        default: null,
    },
    hideTitle: {
        type: Boolean,
        default: false,
    },
    secondary: {
        type: Boolean,
        default: false,
    },
    active: {
        type: Boolean,
        default: undefined,
    },
});

const isActive = computed(() => {
    if (props.active !== undefined) {
        return props.active;
    }

    if (
        props.href?.split('/').length ==
        window.location.pathname.split('/').length
    ) {
        return window.location.pathname == props.href;
    }

    if (props.href?.split('/').length > 2) {
        return window.location.pathname.includes(props.href);
    }

    return window.location.pathname == props.href;
});

const as = computed(() => {
    return props.href ? 'a' : 'div';
});
</script>
