<template>
    <Main v-if="show">
        <Topbar>
            <div class="font-semibold">
                {{ eventForm.attributes.title }}
            </div>
            <div class="flex items-center space-x-4">
                <SaveButton
                    @save="save()"
                    :disabled="!eventForm.isDirty"
                    :busy="busy"
                >
                    {{ $t('pages.save') }}
                </SaveButton>
            </div>
        </Topbar>
        <MainBody>
            <MainContent>
                <div class="grid gap-10">
                    <Card>
                        <FormGroup class="">
                            <Input
                                v-model="eventForm.attributes.title"
                                label="Titel"
                            />
                            <FormField label="Zeitraum">
                                <div class="grid grid-cols-2 gap-10">
                                    <DatePicker
                                        :with-time="true"
                                        v-model="eventForm.starts_at.iso"
                                        label="Beginn"
                                    />
                                    <DatePicker
                                        :with-time="true"
                                        v-model="eventForm.ends_at.iso"
                                        label="Ende (optional)"
                                    />
                                </div>
                            </FormField>
                        </FormGroup>
                        <FormField label="Ort der Veranstaltung">
                            <Textarea v-model="eventForm.attributes.location" />
                        </FormField>
                    </Card>
                    <Card>
                        <FormField label="Vorschautext">
                            <Textarea v-model="eventForm.attributes.excerpt" />
                        </FormField>
                        <FormField label="Beschreibung">
                            <Wysiwyg v-model="eventForm.attributes.text" />
                        </FormField>
                    </Card>
                </div>
                <div class="mt-4">
                    <Button secondary @click="del">
                        Veranstaltung löschen.
                    </Button>
                </div>
                <!-- <pre>{{ eventForm }}</pre> -->
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
import { eventForm, deleteEvent } from '@/entities';
import {
    Main,
    MainBody,
    MainContent,
    MainSidebar,
    MainSidebarSection,
} from '@/layout';
import { computed, onBeforeMount, onMounted, ref } from 'vue';
import Topbar from '@/layout/components/Topbar.vue';
import { useRoute, useRouter } from 'vue-router';
import SaveButton from '@/modules/save/SaveButton.vue';
import {
    Card,
    Input,
    Wysiwyg,
    Textarea,
    FormGroup,
    FormField,
    Button,
} from '@/ui';
import IconLabelOutlineVue from '@/ui/Icons/IconLabelOutline.vue';
import DatePicker from '@/ui/DatePicker.vue';

const show = ref<boolean>(false);

const route = useRoute();
const router = useRouter();

onMounted(() => {
    let id = parseInt(route.params.event as string);

    eventForm.load(id).then(() => {
        show.value = true;
    });
});

const busy = ref<boolean>(false);

const save = async () => {
    busy.value = true;
    await eventForm.submit();
    busy.value = false;
};

const del = () => {
    let id = parseInt(route.params.event as string);

    if (
        confirm(
            `Bist du sicher, dass die Veranstaltung "${eventForm.attributes.title}" gelöscht werden soll?`
        )
    ) {
        deleteEvent(id).then(response => {
            router.push(`/events/`);
        });
    }
};

const isOpen = ref(true);
</script>
