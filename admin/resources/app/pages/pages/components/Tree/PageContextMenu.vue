<template>
    <ContextMenu>
        <template v-slot:button>
            <button
                class="p-1 text-gray-100 opacity-0 hover:bg-black rounded-xs group-hover:opacity-100"
            >
                <IconMoreHoriz class="w-4 h-4" />
            </button>
        </template>
        <AddPageModal :parent="page">
            <template #button="{ open }">
                <ContextMenuItem @click="open">
                    <template #icon>
                        <IconPlus class="w-4 h-4" />
                    </template>
                    {{ $t('pages.sub_page') }}
                </ContextMenuItem>
            </template>
        </AddPageModal>
        <DuplicatePageModal :page="page">
            <template #button="{ open }">
                <ContextMenuItem @click="open">
                    <template #icon>
                        <IconCopy class="w-4 h-4" />
                    </template>
                    {{ $t('pages.duplicate') }}
                </ContextMenuItem>
            </template>
        </DuplicatePageModal>
        <ContextMenuItem :to="`/pages/edit/${page.id}?root=${page.id}`">
            <template #icon>
                <IconNetworkRight class="w-4 h-4" />
            </template>
            <span>Strang öffnen</span>
        </ContextMenuItem>
        <!-- <ContextMenuItem
            class="hover:bg-red-signal hover:text-white text-red-signal"
            @click="deletePage(page.id)"
        >
            <template #icon>
                <IconTrash class="origin-left scale-75" />
            </template>
            <span>{{ $t('pages.delete') }}</span>
        </ContextMenuItem> -->
    </ContextMenu>
</template>

<script lang="ts" setup>
import { ContextMenu, ContextMenuItem } from '@/ui';

import IconMoreHoriz from '@/ui/Icons/IconMoreHoriz.vue';
import IconTrash from '@/ui/Icons/IconTrash.vue';
import IconPlus from '@/ui/Icons/IconPlus.vue';
import IconCopy from '@/ui/Icons/IconCopy.vue';
import IconNetworkRight from '@/ui/Icons/IconNetworkRight.vue';

import { PropType } from 'vue';
import { Page } from '@/types/resources';
import { deletePage } from '@/entities';
import AddPageModal from '../AddPageModal.vue';
import DuplicatePageModal from '../DuplicatePageModal.vue';

const props = defineProps({
    page: {
        type: Object as PropType<Page>,
        required: true,
    },
});
</script>
