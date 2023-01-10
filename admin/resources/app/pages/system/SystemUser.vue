<template>
    <Main v-if="show">
        <Topbar>
            <span>
                {{ systemUserForm.name }}
            </span>
            <SaveButton
                @save="save()"
                :disabled="!systemUserForm.isDirty"
                :busy="busy"
            >
                {{ $t('pages.save') }}
            </SaveButton>
        </Topbar>
        <MainBody>
            <MainContent>
                <Card class="mb-6">
                    <FormGroup class="grid grid-cols-2 gap-5">
                        <Input v-model="systemUserForm.name" label="Name" />
                        <Input
                            v-model="systemUserForm.email"
                            label="E-Mail Adresse"
                        />
                    </FormGroup>
                </Card>
                <Card>
                    <h3 class="mb-5">Admin Status</h3>
                    <FormGroup>
                        <Toggle
                            label="User is Admin"
                            v-model="systemUserForm.is_admin"
                        />
                    </FormGroup>
                </Card>
                <div class="mt-4">
                    <Button secondary @click="del"> User löschen </Button>
                </div>
            </MainContent>
        </MainBody>
    </Main>
    <Loading v-else />
</template>

<script lang="ts" setup>
import { computed, onBeforeMount, onMounted, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { deleteSystemUser, systemUserForm, systemUserState } from '@/entities';
import { Main, MainBody, MainContent } from '@/layout';
import SaveButton from '@/modules/save/SaveButton.vue';
import Topbar from '@/layout/components/Topbar.vue';
import Loading from '@/layout/components/Loading.vue';
import { Card, Input, FormGroup, Button, Toggle, Select } from '@/ui';

const route = useRoute();
const router = useRouter();

const show = ref<boolean>(false);

onMounted(() => {
    const userId = parseInt(route.params.user as string);

    systemUserState.load(userId);

    systemUserForm.load(userId).then(() => {
        show.value = true;
    });
});

const busy = ref<boolean>(false);

const save = async () => {
    busy.value = true;
    await systemUserForm.submit();
    busy.value = false;
};

const del = () => {
    let id = parseInt(route.params.user as string);

    if (
        confirm(
            `Bist du sicher, dass der User ${systemUserForm.name} gelöscht werden soll?`
        )
    ) {
        deleteSystemUser(id).then(response => {
            router.push(`/system/users`);
        });
    }
};
</script>
