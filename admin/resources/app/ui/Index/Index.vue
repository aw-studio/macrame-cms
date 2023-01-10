<template>
    <div>
        <slot name="search">
            <!-- // -->
        </slot>
        <div
            class="relative w-full overflow-hidden pt-9"
            :class="{ 'bg-white shadow rounded-md': isTable }"
        >
            <slot />
            <slot name="footer">
                <div
                    class="w-full pt-8 pb-4"
                    :class="{ 'border-t border-gray-300': isTable }"
                    v-if="isTable || table.meta.total >= table.meta.per_page"
                >
                    <Pagination :table="table" />
                    <div
                        class="inline-flex justify-end w-full pt-4 pr-6 text-gray"
                    >
                        {{ table.meta.from }}-{{ table.meta.to }}/{{
                            table.meta.total
                        }}
                    </div>
                </div>
            </slot>
            <div
                class="absolute top-0 w-full h-full bg-white bg-opacity-80"
                v-if="busy"
            >
                <Loading />
            </div>
        </div>
        <slot name="pagination"> </slot>
    </div>
</template>

<script lang="ts" setup>
import { PropType } from 'vue';
import { Index } from '@macramejs/macrame-vue3';
import Pagination from './Pagination.vue';
import Loading from '@/layout/components/Loading.vue';

defineProps({
    table: {
        type: Object as PropType<Index<any, any, any>>,
        required: true,
    },
    searchPlaceholder: {
        type: String,
    },
    isTable: {
        type: Boolean,
        default: true,
    },
    busy: {
        type: Boolean,
        default: false,
    },
});
</script>
