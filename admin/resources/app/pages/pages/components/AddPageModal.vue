<template>
    <slot name="button" :open="() => (isOpen = true)">
        <ButtonRound white sm @click="isOpen = true">
            <IconPlus class="w-4 h-4" />
        </ButtonRound>
    </slot>
    <Modal lg v-model:open="isOpen" :title="$t('pages.new_page')">
        <form @submit.prevent="submit">
            <FormGroup>
                <FormField noLabel :errors="form.errors.name">
                    <Input
                        :label="$t('pages.name')"
                        v-model="form.name"
                        :errors="form.errors.name"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.slug">
                    <Input
                        :label="$t('pages.slug')"
                        :modelValue="form.slug"
                        @update:modelValue="updateSlug"
                        :errors="form.errors.slug"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.template">
                    <SelectSearch
                        :label="$t('pages.template')"
                        :options="templateOptions"
                        v-model="form.template"
                        :errors="form.errors.template"
                    />
                </FormField>
            </FormGroup>

            <input type="submit" class="hidden" />
        </form>
        <template v-slot:footer>
            <Button @click="submit"> {{ $t('pages.save') }} </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref, PropType, watch } from 'vue';
import {
    Modal,
    Input,
    SelectSearch,
    ButtonRound,
    Button,
    FormGroup,
    FormField,
} from '@/ui';
import IconPlus from '@/ui/Icons/IconPlus.vue';
import { templateOptions } from '../templates';
import { Page } from '@/types/resources';
import { slugify } from '@/modules/helpers';

// FORM
import { usePageForm } from '@/entities';
import { PageForm } from '@/types';
import { useRouter } from 'vue-router';
import { pageTree } from '@/entities';

const props = defineProps({
    parent: {
        type: Object as PropType<Page>,
        required: false,
    },
});

const isOpen = ref<boolean>(false);

const form: PageForm = usePageForm({
    parent_id: props.parent?.id,
    template: 'default',
});

const isSlugEdited = ref(false);

const router = useRouter();

const submit = function () {
    form.submit().then(response => {
        pageTree.load(undefined);
        router.push(`/pages/edit/${response.data.data.id}`);
        isOpen.value = false;
    });
};

const updateSlug = function (value: string) {
    form.slug = slugify(value);
    isSlugEdited.value = true;
};

watch(
    () => form.name,
    () => {
        if (!isSlugEdited.value) {
            form.slug = slugify(form.name);
        }
    },
    { immediate: true }
);
</script>
