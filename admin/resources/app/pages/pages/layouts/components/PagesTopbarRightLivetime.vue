<template>
    <div class="flex items-center space-x-2">
        <span class="text-xs uppercase">
            <template v-if="!pageForm.is_live">{{
                $t('pages.offline')
            }}</template>
            <template
                v-else-if="
                    !pageForm.publish_at || pageState.value.has_been_published
                "
                >{{ $t('pages.online') }}</template
            >
            <template v-else>{{ $t('pages.planned') }}</template>
        </span>
        <Toggle
            :modelValue="
                pageForm.is_live &&
                (!pageForm.publish_at || pageState.value.has_been_published)
            "
            @update:modelValue="
                () => {
                    if (pageForm.publish_at) {
                        publishAt = null;
                        pageForm.publish_at = null;
                    }
                    pageForm.is_live = !pageForm.is_live;
                }
            "
        />
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
        timezone=""
        :min-date="new Date()"
    >
        <div
            class="relative flex items-center justify-center w-8 h-8 bg-gray-200 rounded cursor-pointer hover:bg-gray-300"
            @click="togglePopover"
        >
            <div
                class="absolute top-0 right-0 w-3 h-3 -mt-1 -mr-1 border-2 border-gray-100 rounded-full bg-orange"
                v-if="pageForm.publish_at"
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
import { ref, watch } from 'vue';
import { Toggle } from '@/ui';
import { pageForm } from '@/entities';
import { pageState } from '@/entities';
import { DatePicker } from 'v-calendar';
import 'v-calendar/dist/style.css';

const publishAt = ref<Date | null>(null);

watch(
    () => pageForm.value.isLoading,
    val => {
        if (!val) {
            publishAt.value = pageForm.value.publish_at
                ? new Date(pageForm.value.publish_at)
                : null;
        }
    }
);

const modelConfig = {
    type: 'string',
    mask: 'iso',
};

watch(
    () => publishAt.value,
    date => {
        if (date) {
            pageForm.value.publish_at = date.toString();
            if (date != null) pageForm.value.is_live = true;
            pageState.value.has_been_published = false;
        }
    }
);
</script>
