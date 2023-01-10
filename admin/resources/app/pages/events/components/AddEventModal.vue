<template>
    <slot name="button" :open="() => (isOpen = true)">
        <Button @click="isOpen = true"> Veranstaltung hinzufügen </Button>
    </slot>
    <Modal lg v-model:open="isOpen" title="Neue Veranstaltung">
        <form @submit.prevent="submit">
            <div class="space-y-3">
                <FormField noLabel :errors="form.errors['attributes.title']">
                    <Input
                        label="Überschrift"
                        v-model="form.attributes.title"
                        :errors="form.errors['attributes.title']"
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
                <FormField noLabel :errors="form.errors.starts_at">
                    <DatePicker
                        label="Beginn"
                        v-model="form.starts_at.iso"
                        :errors="[form.errors.starts_at]"
                    />
                </FormField>
            </div>
            <input type="submit" class="hidden" />
        </form>
        <template v-slot:footer>
            <Button @click="submit"> Veranstaltung hinzufügen </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { computed, onBeforeMount, ref, watch } from 'vue';
import { Modal, Input, Button, DatePicker, Select } from '@/ui';
import { blocksState, useEventForm } from '@/entities';
import { EventForm } from '@/types';
import { useRouter } from 'vue-router';
import { slugify } from '@/modules/helpers';
import FormField from '@/ui/Form/FormField.vue';

const isOpen = ref<boolean>(false);

const form: EventForm = useEventForm();

const router = useRouter();

const submit = () => {
    form.submit().then(response => {
        blocksState.load();

        router.push(`/events/${response.data.data.id}`);

        isOpen.value = false;
    });
};

const updateSlug = function (value: string) {
    form.slug = slugify(value);
    isSlugEdited.value = true;
};

const isSlugEdited = ref(false);
watch(
    () => form.attributes.title,
    () => {
        if (!isSlugEdited.value) {
            form.slug = slugify(form.attributes.title);
        }
    },
    { immediate: true }
);
</script>
