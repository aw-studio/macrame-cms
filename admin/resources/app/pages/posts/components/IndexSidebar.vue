<template>
    <MainSidebar title="Filter" v-model:open="isOpen">
        <template v-slot:icon>
            <IconInputSearch class="w-4 h-4" />
        </template>
        <MainSidebarSection title="Suche">
            <Input v-model.debounce="postIndex.search" />
            <div v-if="postIndex.search">
                {{ postIndex.meta.total }} Treffer
            </div>
        </MainSidebarSection>
        <MainSidebarSection title="Auslobung" v-if="isAdmin">
            <Checkbox
                class="-ml-1"
                v-model="postIndex.filters.featured.value"
                value="is_featured"
                field-id="1"
            >
                ausgelobt
            </Checkbox>
            <Checkbox
                class="-ml-1"
                v-model="postIndex.filters.default.value"
                value="is_pinned"
                field-id="1"
            >
                gepinnt
            </Checkbox>
        </MainSidebarSection>
    </MainSidebar>
</template>
<script lang="ts" setup>
import { ref } from 'vue';
import { MainSidebar, MainSidebarSection } from '@/layout';
import { Checkbox, Input } from '@/ui';
import IconInputSearch from '@/ui/Icons/IconInputSearch.vue';
import { postIndex, isAdmin } from '@/entities';
const isOpen = ref(true);
</script>
