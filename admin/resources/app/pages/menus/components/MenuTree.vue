<template>
    <BaseTree
        :tree="tree"
        :group="{ name: 'nav-tree' }"
        class="nav-tree-wrapper py-0.5"
    >
        <template v-slot:default="{ item, children }">
            <MenuTreeItem
                :menu-item="item"
                :children="children"
                :live="live && item.is_public"
                :key="item.id"
            />
        </template>
    </BaseTree>
</template>

<script lang="ts" setup>
import { MenuItem, Link } from '@/types';
import { PropType } from 'vue';
import { Tree } from '@macramejs/macrame-vue3';
import { Tree as BaseTree } from '@/ui';
import MenuTreeItem from './MenuTreeItem.vue';

defineProps({
    tree: {
        type: Object as PropType<Tree<MenuItem>>,
        required: true,
    },
    live: {
        type: Boolean,
        default: true,
    },
});
</script>

<style>
.nav-tree-wrapper > div {
    padding: 0 !important;
}
</style>
