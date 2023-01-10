<template>
    <ContextMenu>
        <template #button>
            <ContextButton />
        </template>
        <AddOrEditItemModal :menu-item="menuItem" :menu="menuState.value">
            <template #button="{ open }">
                <ContextMenuItem @click="open">
                    {{ $t('menus.edit') }}
                </ContextMenuItem>
            </template>
        </AddOrEditItemModal>

        <ContextMenuItem
            class="hover:bg-red-signal text-red-signal"
            @click="deleteItem()"
        >
            <template #icon>
                <IconTrash class="origin-left scale-75" />
            </template>
            <span>{{ $t('menus.delete') }}</span>
        </ContextMenuItem>
    </ContextMenu>
</template>

<script lang="ts" setup>
import { MenuItem } from '@/types';
import { ContextMenu, ContextMenuItem, ContextButton } from '@/ui';
import IconTrash from '@/ui/Icons/IconTrash.vue';
import { PropType } from 'vue';
import AddOrEditItemModal from './AddOrEditItemModal.vue';
import { menuState, deleteMenuItem } from '@/entities';
import { menuItemTree } from '@/entities';

const props = defineProps({
    menuItem: {
        type: Object as PropType<MenuItem>,
        required: true,
    },
});

const deleteItem = () => {
    deleteMenuItem(menuState.value, props.menuItem.id).finally(() => {
        menuItemTree.value.load();
    });
};
</script>
