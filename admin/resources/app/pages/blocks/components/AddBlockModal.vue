<template>
    <slot name="button" :open="() => (isOpen = true)">
        <ButtonRound white sm @click="isOpen = true">
            <IconPlus class="w-4 h-4" />
        </ButtonRound>
    </slot>
    <Modal lg v-model:open="isOpen" title="Neuer Block">
        <form @submit.prevent="submit">
            <div class="space-y-3">
                <FormField noLabel :errors="form.errors.name">
                    <Input
                        label="Name"
                        v-model="form.name"
                        :errors="form.errors.name"
                    />
                </FormField>
            </div>
            <input type="submit" class="hidden" />
        </form>
        <template v-slot:footer>
            <Button @click="submit"> {{ $t('blocks.save') }} </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Modal, Input, ButtonRound, Button, FormField } from '@/ui';
import IconPlus from '@/ui/Icons/IconPlus.vue';
import { blocksState, useBlockForm } from '@/entities';
import { BlockForm } from '@/types';
import { useRouter } from 'vue-router';

const isOpen = ref<boolean>(false);

const form: BlockForm = useBlockForm({});

const router = useRouter();

const submit = () => {
    form.submit().then(response => {
        blocksState.load();

        router.push(`/blocks/${response.data.data.id}`);

        isOpen.value = false;
    });
};

// const emit = defineEmits(['blockAdded', 'close']);

// const form = useForm({
//     route: `/admin/blocks`,
//     data: {
//         name: '',
//     },
//     method: 'post',
//     onSuccess(response) {
//         emit('blockAdded', this);
//         isOpen.value = false;
//         form.reset();

//         // Visit the recently created block, to refresh the Block/Show component
//         // when currently already on a block.
//         Inertia.visit(`/admin/blocks/${response.props.block.data.id}`, {
//             only: ['block'],
//         });
//     },
// });
</script>
