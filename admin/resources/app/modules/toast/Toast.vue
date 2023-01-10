<template>
    <div class="fixed w-full max-w-sm bottom-10 right-10">
        <TransitionGroup
            appear
            name="notifications"
            tag="div"
            class="relative flex flex-col-reverse gap-5"
        >
            <div
                v-for="(notification, id) in notifications"
                :key="notification.id"
                class="relative w-full p-6 border-t-4 rounded-xs"
                :class="{
                    'bg-gray-700 border-gray-800 text-white':
                        notification.type == 'info' || !notification.type,
                    'bg-red-signal border-[#c5324f] text-white':
                        notification.type == 'error',
                    'bg-yellow-signal border-[#d5bc49] text-black':
                        notification.type == 'warning',
                    'bg-green-signal border-[#30b57c] text-black':
                        notification.type == 'success',
                }"
            >
                <button
                    v-if="notification.dismissable"
                    @click="notifications.splice(id, 1)"
                    class="absolute top-0.5 right-1.5"
                >
                    <IconCancelVue class="w-5 h-5" />
                </button>
                <div v-if="notification.title" class="mb-2 font-semibold">
                    {{ notification.title }}
                </div>
                {{ notification.text }}
            </div>
        </TransitionGroup>
    </div>
</template>
<script lang="ts" setup>
import { notifications } from './index';
import IconCancelVue from '@/ui/Icons/IconCancel.vue';

defineProps({
    busy: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['save']);
</script>

<style>
.notifications-move,
.notifications-enter-active,
.notifications-leave-active {
    transition: all 0.5s ease;
}
.notifications-enter-from,
.notifications-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
.list-leave-active {
    position: absolute;
}
</style>
