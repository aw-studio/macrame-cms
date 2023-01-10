<template>
    <table class="table w-full">
        <thead class="text-left text-gray-800 bg-white thead">
            <slot name="thead">
                <tr>
                    <Th
                        v-for="(column, thKey) in schema"
                        :key="`th-${thKey}`"
                        :column="column"
                        class="pr-4 text-xs font-normal bg-white h-7"
                    />
                </tr>
            </slot>
        </thead>
        <tbody>
            <slot name="tbody" :items="table.items">
                <Tr v-for="(item, trKey) in table.items" :key="`th-${trKey}`">
                    <Td
                        v-for="(column, tdKey) in schema"
                        :key="`td-${tdKey}`"
                        :column="column"
                        :item="item"
                        class="py-4 pr-4"
                    />
                </Tr>
            </slot>
        </tbody>
    </table>
</template>

<script lang="ts" setup>
import { PropType } from 'vue';
import { Index } from '@macramejs/macrame-vue3';
import Tr from './Tr.vue';
import Th from './Th.vue';
import Td from './Td.vue';

defineProps({
    selectable: {
        type: Boolean,
        default: false,
    },
    table: {
        type: Object as PropType<Index>,
        required: true,
    },
    schema: {
        type: Array,
        required: false,
    },
});
</script>

<style>
.table .slim {
    width: 1%;
    white-space: nowrap;
}
.table .thead {
    box-shadow: inset 0px -1px 0px #e5eaef;
}
</style>
