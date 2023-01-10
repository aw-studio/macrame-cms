<template>
    <div class="flex justify-end mb-4">
        <button
            @click="hideSections = !hideSections"
            class="flex space-x-2 hover:font-semibold"
        >
            <template v-if="hideSections">
                <span class="text-xs uppercase">{{
                    $t('pages.show_all')
                }}</span>
                <IconExpand class="w-4 h-4" />
            </template>
            <template v-if="!hideSections">
                <span class="text-xs uppercase">{{
                    $t('pages.collapse_all')
                }}</span>
                <IconCollapse class="w-4 h-4" />
            </template>
        </button>
    </div>
</template>

<script lang="ts" setup>
import { hideSections } from '@/modules/content';
import IconExpand from '@/ui/Icons/IconExpand.vue';
import IconCollapse from '@/ui/Icons/IconCollapse.vue';
</script>
