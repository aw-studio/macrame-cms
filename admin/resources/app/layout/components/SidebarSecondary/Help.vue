<template>
    <ContextMenu>
        <template v-slot:button>
            <button class="text-sm text-gray hover:underline whitespace-nowrap">
                {{ $t('layout.help') }}
            </button>
        </template>
        <div class="p-4">
            <slot />
        </div>
    </ContextMenu>
</template>

<script lang="ts" setup>
import { ContextMenu } from '@/ui';
</script>
