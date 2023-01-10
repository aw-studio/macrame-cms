<template>
    <SidebarSecondary>
        <template v-slot:header>
            <SidebarSecondaryHeader title="Medien">
                <template v-slot:icon>
                    <IconReportColumns class="w-5 h-5" />
                </template>
                <template v-slot:help>
                    <!--  -->
                </template>
                <AddMediaCollectionModal v-if="isAdmin" />
            </SidebarSecondaryHeader>
        </template>
        <SidebarSecondarySection>
            <SidebarSecondaryLink
                class="flex items-center h-[36px] flex-auto text-base font-light rounded group hover:bg-white hover:bg-opacity-10 mb-4"
                to="/media"
                :active="!route.params.collection"
            >
                <template v-slot:icon>
                    <IconMediaImageFolder class="w-4 h-4 mr-2" />
                </template>
                Alle Dateien
            </SidebarSecondaryLink>

            <SidebarSecondarySection class="pl-4" title="Sammlungen">
                <FileCollections />
            </SidebarSecondarySection>
        </SidebarSecondarySection>
    </SidebarSecondary>
    <Main>
        <router-view />
    </Main>
</template>

<script setup lang="ts">
import {
    SidebarSecondaryHeader,
    SidebarSecondary,
    SidebarSecondarySection,
} from '@/layout';
import AddMediaCollectionModal from './components/AddMediaCollectionModal.vue';
import Main from '@/layout/components/Main.vue';
import IconReportColumns from '@/ui/Icons/IconReportColumns.vue';
import { isAdmin } from '@/entities';
import FileCollections from './components/FileCollections.vue';
import IconMediaImageFolder from '@/ui/Icons/IconMediaImageFolder.vue';
import SidebarSecondaryLink from '../../../layout/components/SidebarSecondary/SidebarSecondaryLink.vue';
import { useRoute } from 'vue-router';

const route = useRoute();
</script>
