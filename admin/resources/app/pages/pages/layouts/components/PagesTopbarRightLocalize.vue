<template>
    <div class="flex items-center space-x-2">
        <ContextMenu>
            <template #button>
                <div
                    class="relative flex items-center justify-center p-2 h-8 bg-gray-200 rounded cursor-pointer hover:bg-gray-300"
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
    </div>
</template>
<script lang="ts" setup>
// imports
import { ContextMenu, ContextMenuItem } from '@/ui';
import { localize, locale } from '@/modules/localize';

// types

// const props = defineProps({

// });
</script>
