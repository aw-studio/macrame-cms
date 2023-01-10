<template>
    <ContextMenu>
        <template #button>
            <div
                class="relative flex items-center justify-center h-8 p-2 font-normal bg-gray-200 rounded cursor-pointer hover:bg-gray-300"
            >
                {{ localize.getLanguage(locale) }}
            </div>
        </template>

        <template #default="close">
            <ContextMenuItem
                v-for="(language, l) in localize.languages"
                :key="l"
                @click="
                    () => {
                        locale = l;
                        //close();
                    }
                "
            >
                {{ language }}
            </ContextMenuItem>
        </template>
    </ContextMenu>
</template>
<script lang="ts" setup>
import { ContextMenu, ContextMenuItem } from '@/ui';
import { localize, locale } from '@/modules/localize';
</script>
