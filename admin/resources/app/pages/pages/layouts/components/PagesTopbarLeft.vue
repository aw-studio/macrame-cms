<template>
    <div class="flex items-baseline">
        <span class="font-semibold">{{ pageForm.name }}</span>
        <div class="ml-4 space-x-2 text-sm text-gray">
            <a :href="pageUrl" v-html="fullSlug" target="_blank" />
            <EditSlugModal />
        </div>
    </div>
</template>
<script lang="ts" setup>
import { computed } from 'vue';
import { pageForm } from '@/entities';
import { pageState } from '@/entities';
import EditSlugModal from '../../components/EditSlugModal.vue';
import config from '@/config';

const fullSlug = computed(() => {
    if (pageState.value.full_slug) {
        let parts = pageState.value.full_slug.split('/').filter(p => p);
        parts.pop();
        return `${parts.join(' > ')} > <strong>${pageForm.value.slug}</strong>`;
    }
});
const pageUrl = computed(() => {
    if (pageState.value.full_slug) {
        let parts = pageState.value.full_slug.split('/').filter(p => p);
        return `${config.app.url}${parts.join('/')}?preview=${
            pageState.value.preview_key
        }`;
    }
});
</script>
