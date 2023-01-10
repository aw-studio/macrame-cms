<template>
    <MainBody>
        <MainContent class="mx-auto max-w-7xl">
            <ButtonPrimarySection />
            <ButtonOutlineSection />
            <ButtonTextLinkSection />
            <LinkSection />
            <ButtonMidGraySection />
            <ButtonRoundSection />
            <div
                class="grid grid-cols-2 gap-5 pb-10 mb-10 border-b border-gray-400"
            >
                <div class="col-span-full md:col-span-1">
                    <h2 class="mb-4 text-xl font-semibold">
                        ContextButton.vue
                    </h2>
                    <div class="flex gap-5 mb-10">
                        <ContextButton>Test</ContextButton>
                        <ContextButton disabled>Test</ContextButton>
                    </div>
                </div>
                <div class="col-span-full md:col-span-1">
                    <CopyString
                        value="<ContextButton>Test</ContextButton>"
                        label="Template"
                    />
                </div>
            </div>
            <InteractionButtonSection />
        </MainContent>
    </MainBody>
</template>

<script setup lang="ts">
import CopyString from './CopyString.vue';
import { ContextButton } from '@/ui';

import { MainContent, MainBody } from '@/layout';

import {
    ButtonPrimarySection,
    ButtonOutlineSection,
    ButtonTextLinkSection,
    ButtonMidGraySection,
    ButtonRoundSection,
    InteractionButtonSection,
    LinkSection,
} from './sections';
</script>
