<template>
    <Main v-if="show">
        <Topbar>
            <div class="font-semibold">{{ personForm.name }}</div>
            <SaveButton
                @save="save()"
                :disabled="!personForm.isDirty"
                :busy="busy"
            >
                {{ $t('pages.save') }}
            </SaveButton>
        </Topbar>
        <MainBody>
            <MainContent>
                <div class="grid grid-cols-2 gap-6">
                    <Card>
                        <FormGroup>
                            <SelectImage
                                v-model="personForm.image"
                                :from-collection="'people'"
                            />
                        </FormGroup>
                    </Card>
                    <Card>
                        <FormGroup class="mb-6">
                            <Input v-model="personForm.name" label="Name" />
                            <Input
                                v-model="personForm.email"
                                label="E-Mail Adresse"
                            />
                        </FormGroup>
                        <FormGroup class="grid-cols-2 mb-6">
                            <Input
                                v-model="personForm.phone"
                                label="Telefonnummer"
                            />
                        </FormGroup>
                        <FormGroup>
                            <Wysiwyg v-model="personForm.description" />
                        </FormGroup>
                    </Card>
                </div>
                <div class="mt-4">
                    <Button secondary @click="del"> Person löschen. </Button>
                </div>
            </MainContent>
            <MainSidebar title="Einstellungen" v-model:open="isOpen">
                <template v-slot:icon>
                    <IconLabelOutlineVue class="w-4 h-4" />
                </template>
            </MainSidebar>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { personForm, deletePerson } from '@/entities';
import {
    Main,
    MainBody,
    MainContent,
    MainSidebar,
    MainSidebarSection,
} from '@/layout';
import { onMounted, ref, computed, onBeforeMount } from 'vue';
import Topbar from '@/layout/components/Topbar.vue';
import { useRoute, useRouter } from 'vue-router';
import SaveButton from '@/modules/save/SaveButton.vue';
import { Card, Input, Wysiwyg, Button, Select, SelectMultiple } from '@/ui';
import FormGroup from '@/ui/Form/FormGroup.vue';
import SelectImage from '@/modules/media/SelectImage.vue';

const show = ref<boolean>(false);

const route = useRoute();
const router = useRouter();

onMounted(() => {
    let id = parseInt(route.params.person as string);
    personForm.load(id).then(() => {
        show.value = true;
    });
});

const busy = ref<boolean>(false);

const save = async () => {
    busy.value = true;
    await personForm.submit();
    busy.value = false;
};

const del = () => {
    let id = parseInt(route.params.person as string);

    if (
        confirm(
            `Bist du sicher, dass die Person ${personForm.name} gelöscht werden soll?`
        )
    ) {
        deletePerson(id).then(response => {
            router.push(`/people/`);
        });
    }
};
const isOpen = ref(true);
</script>
