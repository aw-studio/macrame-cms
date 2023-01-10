<template>
    <MainBody>
        <MainContent class="mx-auto max-w-7xl">
            <BadgeSection />
            <CardSection />
            <ChipSection />
            <ChipInputSection />
            <DatePickerSection />
            <DateRangeSection />
            <FileUploadSection />
            <ModalSection />
            <ImageSection />
        </MainContent>
    </MainBody>
</template>

<script setup lang="ts">
import { MainContent, MainBody } from '@/layout';
import {
    BadgeSection,
    CardSection,
    ChipSection,
    ChipInputSection,
    DatePickerSection,
    DateRangeSection,
    FileUploadSection,
    ModalSection,
    ImageSection,
} from './sections';
</script>
