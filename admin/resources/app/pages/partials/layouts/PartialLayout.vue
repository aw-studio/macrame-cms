<template>
    <Topbar>
        <div class="font-semibold">{{ $t('partials.partials') }}</div>
        <PartialTopbarRight />
    </Topbar>
    <router-view />
</template>

<script setup lang="ts">
import { computed, watch } from 'vue';
import { Topbar } from '@/layout';
import PartialTopbarRight from './components/PartialTopbarRight.vue';
import { useRoute } from 'vue-router';
import { partialForm } from '@/entities';

const route = useRoute();

const partial = computed(() => {
    return route.params.partial as string;
});

watch(
    () => partial.value,
    template => {
        partialForm.load(template);
    },
    {
        immediate: true,
    }
);
</script>
