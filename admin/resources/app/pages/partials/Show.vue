<template>
    <MainBody>
        <MainContent>
            <TransitionSlideFade>
                <div v-if="!partialForm.isLoading">
                    <component :is="getComponent()" :form="partialForm" />
                </div>
            </TransitionSlideFade>
        </MainContent>
    </MainBody>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { MainBody, MainContent } from '@/layout';
import { partialForm } from '@/entities';
import { useRoute } from 'vue-router';
import { templates } from './_templates';
const route = useRoute();

const partial = computed(() => route.params.partial as string);

const getComponent = () => {
    if (!(partial.value in templates)) {
        console.error(`No template found for ${partial.value}`);
        return 'div';
    }

    return templates[partial.value as keyof typeof templates];
};
</script>
