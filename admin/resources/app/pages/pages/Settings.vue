<template>
    <MainBody>
        <MainContent class="">
            <Card class="flex flex-col max-w-3xl gap-5 mb-5">
                <h2>
                    {{ $t('pages.page_settings') }}
                </h2>
                <FormGroup>
                    <Input
                        :label="$t('pages.page_name')"
                        v-model="pageForm.name"
                    />
                    <Input
                        :label="$t('pages.page_slug')"
                        v-model="pageForm.slug"
                        @update:modelValue="
                            (slug: string) => (pageForm.slug = slugify(slug))
                        "
                    />
                </FormGroup>
            </Card>
            <Card class="flex flex-col max-w-3xl gap-5">
                <h2>
                    {{ $t('pages.delete_page') }}
                </h2>
                <p>
                    {{ $t('pages.confirm_delete_page') }}:
                    <strong>{{ pageState.value.name }}</strong>
                </p>
                <Input v-model="confirm_delete" />

                <Button
                    secondary
                    class="!bg-red-500 !text-white !border-none flex mt-4"
                    @click="submit"
                    :disabled="pageState.value.name != confirm_delete"
                >
                    <IconTrash class="w-4 h-4 mr-2" />
                    {{ $t('pages.delete_page') }}
                </Button>
            </Card>
        </MainContent>
    </MainBody>
</template>

<script lang="ts" setup>
import { MainBody, MainContent } from '@/layout';
import { pageState, pageTree, deletePage } from '@/entities';
import { Card, Input, Button, FormGroup } from '@/ui';
import IconTrash from '@/ui/Icons/IconTrash.vue';
import { slugify } from '@/modules/helpers';
import { pageForm } from '@/entities';
import { ref } from 'vue';
import { router } from '@/plugins/router';

const confirm_delete = ref('');

const submit = async () => {
    await deletePage(pageState.value.id);
    pageTree.load(undefined);
    router.push(`/pages`);
};
</script>
