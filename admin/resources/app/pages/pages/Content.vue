<template>
    <MainBody>
        <MainContent>
            <TransitionSlideFade>
                <div v-if="!pageForm.isLoading">
                    <component :is="getComponent" v-if="!pageForm.isLoading">
                        <ToggleSections />
                        <Content
                            v-model="pageForm.content"
                            :sections="sections"
                        />
                    </component>
                </div>
            </TransitionSlideFade>
        </MainContent>
        <MainSidebar
            v-model:open="isOpen"
            :title="$t('pages.sections')"
            v-if="hasContent(pageForm.template)"
        >
            <template v-slot:icon>
                <IconGridAdd class="w-4 h-4" />
            </template>
            <Drawers />
        </MainSidebar>
    </MainBody>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { MainBody, MainContent, MainSidebar } from '@/layout';
import { templates, hasContent } from './templates';
import { Drawers, sections, Content } from '@/modules/content';
import { pageForm } from '@/entities';
import ToggleSections from './components/ToggleSections.vue';
import { TransitionSlideFade } from '@/ui';
import IconGridAdd from '@/ui/Icons/IconGridAdd.vue';

const getComponent = computed(() => {
    return pageForm.value.template in templates
        ? templates[pageForm.value.template]
        : 'div';
});

const isOpen = ref(true);
</script>
