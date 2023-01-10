<template>
    <SidebarSecondary>
        <template v-slot:header>
            <SidebarSecondaryHeader :title="$t('partials.partials')">
                <template v-slot:icon>
                    <IconReportColumns class="w-5 h-5" />
                </template>
                <template v-slot:help>
                    <PartialsHelp />
                </template>
            </SidebarSecondaryHeader>
        </template>
        <SidebarSecondarySection>
            <SidebarSecondaryLink 
                v-for="(template, index) in templates" 
                class="flex-1 py-1 cursor-pointer"
                :to="`/partials/${index}`"
                >
                    {{ template.__name }}
            </SidebarSecondaryLink>
        </SidebarSecondarySection>
    </SidebarSecondary>
    <Main>
        <router-view />
    </Main>
</template>

<script setup lang="ts">
import { 
    SidebarSecondary, 
    SidebarSecondaryLink, 
    SidebarSecondaryHeader, 
    SidebarSecondarySection 
} from '@/layout';
import Main from '@/layout/components/Main.vue';
import IconReportColumns from '@/ui/Icons/IconReportColumns.vue';
import PartialsHelp from './components/PartialsHelp.vue';
import { templates } from '../_templates';
</script>
