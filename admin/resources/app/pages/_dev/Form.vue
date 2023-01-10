<template>
    <MainBody>
        <MainContent class="mx-auto max-w-7xl">
            <InputSection />
            <FormFieldSection />
            <CheckboxSection />
            <CheckboxSwitchSection />
            <ToggleSection />
            <RadioSection />
            <SelectSection />
            <SelectSearchSection />
            <SelectMultipleSection />
            <SliderSection />
            <TextareaSection />
            <WysiwygSection />
        </MainContent>
    </MainBody>
</template>

<script setup lang="ts">
import { MainContent, MainBody } from '@/layout';
import {
    InputSection,
    FormFieldSection,
    CheckboxSection,
    CheckboxSwitchSection,
    ToggleSection,
    RadioSection,
    SelectSection,
    SelectSearchSection,
    SelectMultipleSection,
    SliderSection,
    TextareaSection,
    WysiwygSection,
} from './sections';
</script>
