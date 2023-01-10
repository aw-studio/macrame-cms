<template>
    <MainSidebarSection :title="$t('content.content')">
        <Cabinet>
            <DrawerH2 :draws="SectionH2" />
            <DrawerTextFull :draws="SectionTextFull" />
            <DrawerTextImage :draws="SectionTextImage" />
            <DrawerInfoBox :draws="SectionInfoBox" />
            <DrawerCTA :draws="SectionCTA" />
            <DrawerMap :draws="SectionMap" />
            <DrawerImageSmall :draws="SectionImageSmall" />
            <DrawerImageFull :draws="SectionImageFull" />
            <DrawerVideoEmbed :draws="SectionVideoEmbed" />
            <DrawerTeaserBoxes :draws="SectionTeaserBoxes" />
            <DrawerInfoSection :draws="SectionInfoSection" />
        </Cabinet>
    </MainSidebarSection>
    <MainSidebarSection :title="$t('content.image_galleries')">
        <Cabinet>
            <DrawerGridGallery :draws="SectionGridGallery" />
            <!-- <DrawerImageCarousel :draws="SectionImageCarousel" /> -->
        </Cabinet>
    </MainSidebarSection>
    <MainSidebarSection :title="$t('content.sections')">
        <Cabinet>
            <DrawerCards :draws="SectionCards" />
            <DrawerDownloads :draws="SectionDownloads" />
            <DrawerLogoWall :draws="SectionLogoWall" />
            <DrawerAccordion :draws="SectionAccordion" />
        </Cabinet>
    </MainSidebarSection>
    <MainSidebarSection :title="$t('content.reusables')">
        <Cabinet>
            <DrawerBlock :draws="SectionBlock" />
        </Cabinet>
    </MainSidebarSection>
</template>

<script lang="ts" setup>
import { MainSidebarSection } from '@/layout';
import Cabinet from './Cabinet.vue';

import {
    SectionH2,
    SectionTextFull,
    SectionTextImage,
    SectionInfoBox,
    SectionCTA,
    SectionDownloads,
    SectionMap,
    SectionInfoSection,
    SectionImageSmall,
    SectionImageFull,
    SectionVideoEmbed,
    SectionGridGallery,
    SectionCards,
    SectionTeaserBoxes,
    SectionAccordion,
    SectionLogoWall,
    SectionBlock,
} from './index';
import {
    DrawerTextFull,
    DrawerImageCarousel,
    DrawerTextImage,
    DrawerInfoBox,
    DrawerCTA,
    DrawerDownloads,
    DrawerMap,
    DrawerInfoSection,
    DrawerImageSmall,
    DrawerImageFull,
    DrawerVideoEmbed,
    DrawerGridGallery,
    DrawerCards,
    DrawerTeaserBoxes,
    DrawerAccordion,
    DrawerLogoWall,
    DrawerBlock,
} from './index';
import DrawerH2 from './elements/H2/DrawerH2.vue';
</script>
