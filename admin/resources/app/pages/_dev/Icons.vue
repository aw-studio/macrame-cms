<template>
    <MainBody>
        <MainContent class="mx-auto max-w-7xl">
            <h2 class="mb-4 text-xl font-semibold">Icons</h2>
            <div class="flex gap-5 mb-10">
                <IconAddMediaImage />
            </div>
        </MainContent>
    </MainBody>
</template>

<script setup lang="ts">
import { MainContent, MainBody } from '@/layout';
import IconAddMediaImage from '@/ui/Icons/IconAddMediaImage.vue';
</script>
