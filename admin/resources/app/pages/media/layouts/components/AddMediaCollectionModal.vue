<template>
    <ButtonRound white sm @click="isOpen = true">
        <IconPlus class="w-4 h-4" />
    </ButtonRound>
    <Modal
        v-model:open="isOpen"
        sm
        :title="$t('media.new_collection')"
        localize
    >
        <form @submit.prevent="submit()">
            <FormField noLabel :errors="mediaCollectionForm.errors.title">
                <Input
                    v-model="mediaCollectionForm.title"
                    :label="$t('media.enter_new_name')"
                    :errors="mediaCollectionForm.errors.title"
                />
            </FormField>
            <FormField noLabel :errors="mediaCollectionForm.errors.key">
                <Input
                    :modelValue="mediaCollectionForm.key"
                    @update:modelValue="updateKey"
                    :label="$t('media.enter_new_key')"
                    :errors="mediaCollectionForm.errors.key"
                />
            </FormField>
        </form>
        <template v-slot:footer>
            <Button @click="submit()">
                {{ $t('content.confirm') }}
            </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref, watch } from 'vue';
import { mediaCollectionIndex, useMediaCollectionForm } from '@/entities';
import { Input } from '@/ui';
import { Button, ButtonRound, Modal } from '@/ui';
import IconPlus from '@/ui/Icons/IconPlus.vue';
import FormField from '@/ui/Form/FormField.vue';
import { slugify } from '@/modules/helpers';

const isOpen = ref<boolean>(false);

const mediaCollectionForm = useMediaCollectionForm({});

const isKeyEdited = ref(false);

const updateKey = function (value: string) {
    mediaCollectionForm.key = slugify(value);
    isKeyEdited.value = true;
};

const submit = () => {
    mediaCollectionForm.submit().then(response => {
        // TODO: maybe push to collection page, when possible
        mediaCollectionIndex.load();
        isOpen.value = false;
    });
};

watch(
    () => mediaCollectionForm.title,
    () => {
        if (!isKeyEdited.value) {
            mediaCollectionForm.key = slugify(mediaCollectionForm.title);
        }
    },
    { immediate: true }
);
</script>
