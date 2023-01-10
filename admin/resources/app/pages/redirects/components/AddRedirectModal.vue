<template>
    <slot name="button" :open="() => (isOpen = true)">
        <Button @click="isOpen = true"> Neue Weiterleitung </Button>
    </slot>
    <Modal lg v-model:open="isOpen" title="Neue Weiterleitung">
        <form @submit.prevent="submit()">
            <FormField :errors="form.errors?.from_url" class="pb-0">
                <Input
                    label="Weiterleitungs URL"
                    v-model="form.from_url"
                    :errors="form.errors?.from_url"
                />
            </FormField>
            <FormField :errors="form.errors?.to_url" class="pb-0">
                <Input
                    label="Ziel URL"
                    v-model="form.to_url"
                    :errors="form.errors?.to_url"
                />
            </FormField>
            <FormField :errors="form.errors?.http_status_code" class="pb-0">
                <Select
                    :options="options"
                    v-model="form.http_status_code"
                    label="Art der Weiterleitung"
                />
            </FormField>
            <input type="submit" class="hidden" />
        </form>
        <template v-slot:footer>
            <Button @click="submit"> Weiterleitung anlegen </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Modal, Input, Button, FormField, Select } from '@/ui';
import { redirectIndex, useRedirectForm } from '@/entities';
import { RedirectForm } from '@/types';

const isOpen = ref<boolean>(false);

const form: RedirectForm = useRedirectForm();

const submit = () => {
    form.submit().then(response => {
        redirectIndex.load();
        isOpen.value = false;
    });
};

const options = [
    {
        label: '301 - Permamente Umleitung',
        value: 301,
    },
    {
        label: '302 - Temporäre Umleitung',
        value: 302,
    },
];
</script>
