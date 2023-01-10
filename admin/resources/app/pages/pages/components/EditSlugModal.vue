<template>
    <button
        @click="isOpen = true"
        class="p-1 bg-white text-gray hover:bg-black rounded-xs group-hover:opacity-100 hover:text-white"
    >
        <IconEditPencil class="w-4 h-4" />
    </button>
    <Modal lg v-model:open="isOpen" :title="$t('pages.edit_slug')">
        <div class="space-y-3">
            <Input
                label="Slug"
                :modelValue="pageForm.slug"
                @update:modelValue="(slug: string) => (pageForm.slug = slugify(slug))"
                @keyup.enter="isOpen = false"
            />
        </div>
        <template #footer>
            <Button @click="isOpen = false">Ok</Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Modal, Input, Button } from '@/ui';
import IconEditPencil from '@/ui/Icons/IconEditPencil.vue';
import { slugify } from '@/modules/helpers';
import { pageForm } from '@/entities';

const isOpen = ref<boolean>(false);
</script>
