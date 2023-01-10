<template>
    <Draggable
        class="py-0.5"
        tag="div"
        :list="children"
        :group="{ name: 'pages-tree' }"
        item-key="name"
        handle=".handle"
    >
        <template #item="{ element, index }">
            <TreeItem
                class="relative pl-6"
                :page="element.value"
                :children="element.children.items"
                :is-first="index == 0"
                :is-last="index == children.length - 1"
            >
                <Nested :children="element.children.items" />
            </TreeItem>
        </template>
    </Draggable>
</template>
<script setup lang="ts">
import Draggable from 'vuedraggable';
import Nested from './Tree.vue';
import TreeItem from './TreeItem.vue';

defineProps({
    children: {
        type: Array,
        required: true,
    },
});
</script>
