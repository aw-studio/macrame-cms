<template>
    <slot name="button" :open="() => (isOpen = true)">
        <Button black sm @click="isOpen = true">
            <slot name="icon">
                <IconPlus class="w-4 h-4" />
            </slot>
            {{ $t('people.new_person') }}
        </Button>
    </slot>
    <Modal lg v-model:open="isOpen" :title="$t('people.new_person')">
        <form @submit.prevent="submit">
            <FormGroup>
                <FormField noLabel :errors="form.errors.name" class="pb-0">
                    <Input
                        v-model="form.name"
                        :label="$t('people.name')"
                        :errors="form.errors.name"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.image" class="pb-0">
                    <SelectImage
                        v-model="(form.image as any)"
                        :collection="'personen'"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.email" class="pb-0">
                    <Input
                        v-model="form.email"
                        label="E-Mail Adresse"
                        :errors="form.errors.email"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.phone" class="pb-0">
                    <Input
                        v-model="form.phone"
                        label="Telefonnummer"
                        :errors="form.errors.phone"
                    />
                </FormField>
            </FormGroup>
            <input type="submit" class="hidden" />
        </form>
        <template v-slot:footer>
            <Button @click="submit"> {{ $t('people.save') }} </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Modal, Input, Button, FormGroup } from '@/ui';
import IconPlus from '@/ui/Icons/IconPlus.vue';
import { usePersonForm } from '@/entities';
import { useRouter } from 'vue-router';
import SelectImage from '@/modules/media/SelectImage.vue';
import { PersonForm } from '@/types';
import FormField from '@/ui/Form/FormField.vue';

const isOpen = ref<boolean>(false);

const form: PersonForm = usePersonForm();

const router = useRouter();

const submit = function () {
    form.submit().then((response: any) => {
        router.push(`/people/${response.data.data.id}`);
        isOpen.value = false;
    });
};
</script>
