<template>
    <div class="flex items-center space-x-2">
        <span class="text-xs uppercase">{{ label }} </span>
        <Toggle :orange="isScheduled" v-model="live" @click="toggleLive()" />
    </div>
    <DatePicker
        v-model="publishAt"
        v-slot="{ togglePopover }"
        :model-config="modelConfig"
        class="relative"
        is-dark
        color="orange"
        mode="dateTime"
        is24hr
    >
        <div
            class="relative flex items-center justify-center w-8 h-8 bg-gray-200 rounded cursor-pointer hover:bg-gray-300"
            @click="togglePopover"
        >
            <div
                class="absolute top-0 right-0 w-3 h-3 -mt-1 -mr-1 border-2 border-gray-100 rounded-full bg-orange"
                v-if="isScheduled"
            ></div>
            <svg
                class="w-4 h-4"
                width="24"
                height="24"
                stroke-width="1.5"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M15 4V2M15 4V6M15 4H10.5M3 10V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V10H3Z"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M3 10V6C3 4.89543 3.89543 4 5 4H7"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M7 2V6"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M21 10V6C21 4.89543 20.1046 4 19 4H18.5"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </div>
    </DatePicker>
</template>
<script lang="ts" setup>
// imports
import { ref, watch, computed } from 'vue';
import { Toggle } from '@/ui';
import { DatePicker } from 'v-calendar';
import 'v-calendar/dist/style.css';

const props = defineProps({
    modelValue: {
        type: String,
        default: null,
    },
});

const emit = defineEmits(['update:modelValue']);

const model = ref<string | null>(props.modelValue);

const modelConfig = {
    type: 'string',
    mask: 'iso',
};
const publishAt = ref<string | null>(null);

const live = ref<boolean>(props.modelValue != null);

const toggleLive = () => {
    if (!live.value) {
        publishAt.value = null;
        model.value = null;
    } else {
        model.value = new Date().toISOString();
    }
};

watch(
    () => model.value,
    val => {
        publishAt.value = val ? new Date(val).toISOString() : null;
    },
    {
        immediate: true,
    }
);

watch(
    () => publishAt.value,
    date => {
        emit('update:modelValue', date);
        if (date) {
            live.value = true;
        }
    }
);

const label = computed(() => {
    if (!publishAt.value) {
        return 'offline';
    }

    return publishAt.value <= new Date().toISOString() ? 'live' : 'geplant';
});

const isScheduled = computed<boolean>(() => {
    if (publishAt.value) {
        return publishAt.value > new Date().toISOString();
    }
    return false;
});
</script>
