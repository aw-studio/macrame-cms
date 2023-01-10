<template>
    <ContextMenu>
        <ContextMenuItem
            class="hover:bg-red-signal text-red-signal hover:text-white"
            @click="deleteMedia(file.id)"
        >
            <template #icon>
                <IconTrash class="origin-left scale-75" />
            </template>
            <span>{{ $t('media.delete_file') }}</span>
        </ContextMenuItem>
    </ContextMenu>
</template>

<script lang="ts" setup>
import { Media } from '@/types/resources';
import { deleteMedia } from '@/entities';
import { PropType } from 'vue';
import { ContextMenu, ContextMenuItem } from '@/ui';
import IconTrash from '@/ui/Icons/IconTrash.vue';

defineProps({
    file: {
        type: Object as PropType<Media>,
        required: true,
    },
});
</script>
