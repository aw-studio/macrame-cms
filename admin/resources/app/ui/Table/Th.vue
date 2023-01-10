<template>
    <th
        class="pb-2 pl-6 font-light bg-white border-b text-gray border-gray"
        :class="{
            'cursor-pointer': isSortable,
        }"
        @click="applySort()"
    >
        <slot />

        <template v-if="isSortable && table && sortBy">
            <span v-if="table.isSortedBy(sortBy, 'desc')"> DESC </span>
            <span v-if="table.isSortedBy(sortBy, 'asc')"> ASC </span>
        </template>
    </th>
</template>

<script lang="ts" setup>
import { PropType, computed } from 'vue';
import { Index } from '@macramejs/macrame-vue3';
import { clone } from 'lodash';
import { Console } from 'console';

const props = defineProps({
    table: {
        type: Object as PropType<Index>,
        required: false,
    },
    sortBy: {
        type: String,
        required: false,
    },
});

const isSortable = computed(() => !!props.sortBy && !!props.table);

const applySort = () => {
    if (!isSortable || !props.table || !props.sortBy) {
        return;
    }

    const sortBy = JSON.parse(JSON.stringify(props.table.sortBy));
    for (let i = 0; i < sortBy.length; i++) {
        if (!sortBy[i] || sortBy[i].key == props.sortBy) continue;
        props.table.removeSortBy(sortBy[i].key, false);
    }

    if (!props.table.isSortedBy(props.sortBy)) {
        props.table.addSortBy(props.sortBy);
    } else if (props.table.isSortedBy(props.sortBy, 'asc')) {
        props.table.addSortBy(props.sortBy, 'desc');
    } else {
        props.table.removeSortBy(props.sortBy, false);
    }
};
</script>
