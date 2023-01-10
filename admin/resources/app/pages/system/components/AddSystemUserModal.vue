<template>
    <slot name="button" :open="() => (isOpen = true)">
        <Button black sm @click="isOpen = true">
            <slot name="icon">
                <IconPlus class="w-4 h-4" />
            </slot>
            {{ $t('system.new_user') }}
        </Button>
    </slot>
    <Modal lg v-model:open="isOpen" :title="$t('system.new_user')">
        <form @submit.prevent="submit">
            <FormGroup>
                <FormField noLabel :errors="form.errors.name">
                    <Input
                        :label="$t('system.name')"
                        :errors="form.errors.name"
                        v-model="form.name"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.email">
                    <Input
                        v-model="form.email"
                        :errors="form.errors.email"
                        label="E-Mail Adresse"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.password">
                    <Input
                        v-model="form.password"
                        :errors="form.errors.password"
                        type="password"
                        label="Password"
                    />
                </FormField>
                <FormField noLabel :errors="form.errors.is_admin">
                    <Toggle label="Admin" v-model="form.is_admin" />
                </FormField>
            </FormGroup>
            <input type="submit" class="hidden" />
        </form>
        <template v-slot:footer>
            <Button @click="submit"> {{ $t('system.save') }} </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Modal, Input, Button, FormGroup, FormField, Toggle } from '@/ui';
import IconPlus from '@/ui/Icons/IconPlus.vue';
import { useSystemUserForm } from '@/entities';
import { useRouter } from 'vue-router';
import { SystemUserForm } from '@/types';

const isOpen = ref<boolean>(false);

const form: SystemUserForm = useSystemUserForm();

const router = useRouter();

const submit = function () {
    form.submit().then((response: any) => {
        router.push(`/system/users/${response.data.data.id}`);
        isOpen.value = false;
    });
};
</script>
