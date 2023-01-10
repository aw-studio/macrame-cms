<template>
    <MainBody>
        <MainContent>
            <Card class="flex flex-col max-w-3xl gap-5 mb-6">
                <h2>
                    {{ $t('pages.meta_information') }}
                </h2>
                <FormField no-label>
                    <Input
                        class="w-full"
                        :label="$t('pages.title')"
                        v-model="pageForm.attributes.meta_title"
                    />
                </FormField>
                <FormField>
                    <Textarea
                        :label="$t('pages.description')"
                        v-model="pageForm.attributes.meta_description"
                    />
                </FormField>
                <div class="mt-4 max-w-[600px]">
                    <span class="inline-block pb-4 text-lg">
                        {{ $t('pages.preview') }}
                    </span>

                    <div class="text-base flex text-[#202124]">
                        <span class="inline-block">
                            {{ origin }}
                        </span>
                        <span
                            class="inline-block"
                            v-html="pageState.value.full_slug"
                        />
                    </div>
                    <div class="text-[20px] text-[#1a0dab]">
                        {{ pageForm.attributes.meta_title }}
                    </div>
                    <div class="text-base text-[#4d5156]">
                        {{ descriptionPreview ? descriptionPreview : '...' }}
                    </div>
                </div>
            </Card>
            <Card class="flex flex-col max-w-3xl gap-5 mb-6">
                <h2>
                    {{ $t('pages.og_information') }}
                </h2>
                <FormField>
                    <FormFieldLabel>
                        {{ $t('pages.og_image') }}
                    </FormFieldLabel>
                    <SelectImage
                        v-model="(pageForm.attributes.meta_og_image as any)"
                    />
                </FormField>
                <FormField
                    hint="Dieses Feld muss nur befüllt werden, wenn der og:title von dem regulären title abweichen soll."
                    no-label
                >
                    <Input
                        class="w-full"
                        :label="$t('pages.og_title')"
                        v-model="pageForm.attributes.meta_og_title"
                    />
                </FormField>
                <FormField
                    hint="Dieses Feld muss nur befüllt werden, wenn die og:description von der regulären description abweichen soll."
                    noLabel
                >
                    <Textarea
                        :label="$t('pages.og_description')"
                        v-model="pageForm.attributes.meta_og_description"
                    />
                </FormField>
                <FormField
                    hint="Beschreibt den og:type der Page (Standardwert: website)."
                    noLabel
                >
                    <Input
                        class="w-full"
                        :label="$t('pages.og_type')"
                        v-model="pageForm.attributes.meta_og_type"
                    />
                </FormField>
                <FormField
                    hint="Dieses Feld muss nur befüllt werden, wenn die og:url nicht die reguläre Page URL sein soll."
                    noLabel
                >
                    <Input
                        class="w-full"
                        :label="$t('pages.og_url')"
                        v-model="pageForm.attributes.meta_og_url"
                    />
                </FormField>
            </Card>
        </MainContent>
    </MainBody>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { MainBody, MainContent } from '@/layout';
import { Card, FormField, FormFieldLabel, Input, Textarea } from '@/ui';
import { pageForm, pageState } from '@/entities';
import SelectImage from '@/modules/media/SelectImage.vue';

const origin = window.location.origin;

const descriptionPreview = computed(() => {
    if (pageForm.value.attributes.meta_description?.length > 160) {
        let trimmed = pageForm.value.attributes.meta_description
            ?.substr(0, 160)
            .substr(0, 160);

        // re-trim if we are in the middle of a word
        trimmed = trimmed.substr(
            0,
            Math.min(trimmed.length, trimmed.lastIndexOf(' '))
        );

        return `${trimmed} \u2026`;
    }

    return pageForm.value.attributes.meta_description;
});
</script>
