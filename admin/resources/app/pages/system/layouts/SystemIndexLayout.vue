<template>
    <SidebarSecondary>
        <template v-slot:header>
            <SidebarSecondaryHeader :title="$t('system.system_management')">
                <template v-slot:icon>
                    <IconSettings class="w-5 h-5" />
                </template>
                <template v-slot:help>
                    <SystemsHelp />
                </template>
            </SidebarSecondaryHeader>
        </template>
        <SidebarSecondarySection>
            <SidebarSecondaryLink
                title="Nutzerverwaltung"
                to="/system/users"
                class="cursor-pointer"
            />
        </SidebarSecondarySection>
        <SidebarSecondarySection>
            <SidebarSecondaryLink
                title="Allgemeine Einstellungen"
                to="/system/settings"
                class="cursor-pointer"
            />
        </SidebarSecondarySection>
    </SidebarSecondary>
    <Main><router-view /></Main>
</template>

<script setup lang="ts">
import { computed, watch } from 'vue';
import { useRoute } from 'vue-router';
import MenusTopbarRight from './components/MenusTopbarRight.vue';
import MenusTopbarLeft from './components/MenusTopbarLeft.vue';
import { Topbar, Loading } from '@/layout';
import IconSettings from '@/ui/Icons/IconSettings.vue';
import {
    Main,
    SidebarSecondaryHeader,
    SidebarSecondary,
    SidebarSecondarySection,
    SidebarSecondaryLink,
} from '@/layout';
import SystemsHelp from './components/SystemsHelp.vue';
</script>
