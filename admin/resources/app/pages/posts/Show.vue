<template>
    <Main v-if="show">
        <Topbar>
            <div class="font-semibold">
                {{ postForm.attributes.title }}
            </div>
            <div class="flex items-center space-x-4">
                <Publish v-model="postForm.publish_at.iso" />
                <SaveButton
                    @save="save()"
                    :disabled="!postForm.isDirty"
                    :busy="busy"
                >
                    {{ $t('pages.save') }}
                </SaveButton>
            </div>
        </Topbar>
        <MainBody>
            <MainContent>
                <Card>
                    <FormGroup>
                        <Input
                            v-model="postForm.attributes.title"
                            label="Überschrift"
                        />
                        <Input
                            v-model="postForm.attributes.sub_title"
                            label="Unterüberschrift"
                        />
                        <Wysiwyg
                            v-model="postForm.attributes.text"
                            label="Inhalt"
                        />
                    </FormGroup>
                </Card>
                <div class="mt-4">
                    <ToggleSections />
                    <Content
                        v-model="postForm.content"
                        :sections="sections"
                        :full-height="false"
                    />
                </div>
                <div class="mt-4">
                    <Button secondary @click="del"> Meldung löschen. </Button>
                </div>
            </MainContent>

            <MainSidebar title="Einstellungen" v-model:open="isOpen">
                <template v-slot:icon>
                    <IconLabelOutlineVue class="w-4 h-4" />
                </template>
                <MainSidebarSection title="Titelbild">
                    <FormGroup>
                        <SelectImage
                            v-model="(postForm.attributes.image as any)"
                        />
                        <Input
                            v-if="postForm.attributes.image"
                            v-model="postForm.attributes.image.title"
                            label="Bildtitel"
                        />
                        <Input
                            v-if="postForm.attributes.image"
                            v-model="postForm.attributes.image.alt"
                            label="Alt"
                        />
                    </FormGroup>
                </MainSidebarSection>
                <MainSidebarSection title="Ablaufdatum">
                    <DatePicker
                        :with-time="true"
                        v-model="postForm.unpublish_at.iso"
                    />
                </MainSidebarSection>
                <MainSidebarSection title="Auslobung Startseite">
                    <div class="p-4 mt-2 bg-gray-100 rounded-xs">
                        <FormField label="Vorschlag Auslobung">
                            <Toggle
                                v-model="postForm.propose_for_feature"
                            />
                        </FormField>
                        <div v-if="isAdmin">
                            <FormField label="Auslobung bis">
                                <DatePicker
                                    v-model="postForm.feature_until.iso"
                                />
                            </FormField>
                            <FormField
                                label="Wichtigkeit"
                                v-if="postForm.feature_until.iso"
                            >
                                <Slider
                                    v-model="postForm.importance"
                                    min="1"
                                    max="5"
                                    step="1"
                                />
                            </FormField>
                            <FormField
                                label="Auslobung anpinnen"
                                v-if="postForm.feature_until.iso"
                            >
                                <Toggle v-model="postForm.is_pinned" />
                            </FormField>
                        </div>
                    </div>
                </MainSidebarSection>
                <MainSidebarSection title="Tags">
                    <!--  -->
                </MainSidebarSection>
                <MainSidebarSection title="Inhaltskomponenten">
                    <!--  -->
                    <Cabinet>
                        <DrawerTextFull :draws="SectionTextFull" />
                        <DrawerTextImage :draws="SectionTextImage" />
                        <DrawerImageSmall :draws="SectionImageSmall" />
                        <DrawerImageFull :draws="SectionImageFull" />
                        <DrawerVideoEmbed :draws="SectionVideoEmbed" />
                        <DrawerCTA :draws="SectionCTA" />
                    </Cabinet>
                </MainSidebarSection>
            </MainSidebar>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { postForm, deletePost, isAdmin } from '@/entities';
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
import { Card, Input, Wysiwyg, Button, Select } from '@/ui';
import FormGroup from '@/ui/Form/FormGroup.vue';
import IconLabelOutlineVue from '@/ui/Icons/IconLabelOutline.vue';
import SelectImage from '@/modules/media/SelectImage.vue';
import Publish from '@/modules/publish/Publish.vue';
import Toggle from '@/ui/Form/Toggle.vue';
import DatePicker from '@/ui/DatePicker.vue';
import Slider from '@/ui/Form/Slider.vue';
import FormField from '@/ui/Form/FormField.vue';

import {
    SectionTextFull,
    SectionTextImage,
    SectionImageSmall,
    SectionImageFull,
    SectionVideoEmbed,
    SectionCTA,
} from '@/modules/content';
import {
    DrawerTextFull,
    DrawerTextImage,
    DrawerImageSmall,
    DrawerImageFull,
    DrawerVideoEmbed,
    DrawerCTA,
} from '@/modules/content';
import Cabinet from '@/modules/content/Cabinet.vue';
import { Drawers, sections, Content } from '@/modules/content';
const show = ref<boolean>(false);

const route = useRoute();
const router = useRouter();

onMounted(() => {
    let id = parseInt(route.params.post as string);

    postForm.load(id).then(() => {
        show.value = true;
    });
});

const busy = ref<boolean>(false);

const save = async () => {
    busy.value = true;
    await postForm.submit();
    busy.value = false;
};

const del = () => {
    let id = parseInt(route.params.post as string);

    if (
        confirm(
            `Bist du sicher, dass die Meldung ${postForm.attributes.title} gelöscht werden soll?`
        )
    ) {
        deletePost(id).then(response => {
            router.push(`/posts/`);
        });
    }
};

const isOpen = ref(true);
</script>
