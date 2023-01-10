<template>
    <slot name="button" :open="() => (isOpen = true)">
        <IconCopy class="w-4 h-4" />
    </slot>
    <Modal lg v-model:open="isOpen" :title="$t('pages.duplicate_page')">
        <form @submit.prevent="submit()">
            <div class="space-y-3">
                <Input :label="$t('pages.new_page_name')" v-model="form.name" />
            </div>
            <input type="submit" class="hidden" />
        </form>
        <template v-slot:footer>
            <Button @click="submit()">
                {{ $t('pages.duclicate') }}
            </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref, PropType } from 'vue';
import { Modal, Input, Button } from '@/ui';
import IconCopy from '@/ui/Icons/IconCopy.vue';
import { Page } from '@/types/resources';
import { useDuplicatePageForm } from '@/entities';
import { useRouter } from 'vue-router';

const isOpen = ref<boolean>(false);

const props = defineProps({
    page: {
        type: Object as PropType<Page>,
        required: true,
    },
});

const form = useDuplicatePageForm(
    {
        name: '',
    },
    props.page.id
);

const router = useRouter();

const submit = () => {
    form.submit().then(response => {
        router.push(`/pages/edit/${response.data.data.id}`);
    });
};
</script>
