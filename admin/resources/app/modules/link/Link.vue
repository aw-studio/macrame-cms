<template>
    <div class="flex items-center space-x-3">
        <ButtonMidGray @click="init()">
            {{ $t('content.chose_link') }}
        </ButtonMidGray>
        <IconArrowRight class="w-4 h-4" v-if="model.url" />
        <div v-if="model.url" class="text-sm text-orange">
            {{ model.url }}
        </div>
    </div>
    <Modal v-model:open="isOpen" md :title="$t('content.chose_link')" localize>
        <FormGroup>
            <Input v-model="model.text" class="w-full" label="Linktext" />

            <div class="flex items-center space-x-2">
                <span> Externer link </span><Toggle v-model="external" />
            </div>
            <SelectSearch
                v-if="!external"
                label="Link"
                v-model="model.url"
                :options="linksState.value"
                labelKey="title"
                valueKey="link"
            />

            <Input
                v-else
                v-model="model.url"
                class="w-full"
                label="Externer Link"
            />

            <div class="flex items-center space-x-2">
                <span> In neuem Tab öffnen </span>
                <Toggle v-model="model.new_tab" />
            </div>
        </FormGroup>
        <template v-slot:footer>
            <Button @click="submit()">
                {{ $t('content.confirm') }}
            </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { PropType, ref, watch } from 'vue';
import {
    Input,
    Button,
    ButtonMidGray,
    Modal,
    Select,
    SelectSearch,
    Toggle,
    FormGroup,
} from '@/ui';
import { linksState } from '@/entities';
import IconArrowRight from '@/ui/Icons/IconArrowRight.vue';

const emit = defineEmits(['update:modelValue']);

interface Link {
    url: string;
    text: string;
    new_tab: boolean;
    external: boolean;
}

const props = defineProps({
    modelValue: {
        type: Object as PropType<Link>,
        required: true,
    },
});

const external = ref<boolean>(props.modelValue.url?.startsWith('http'));
const model = ref<Link>(props.modelValue);

watch(
    () => external.value,
    val => {
        model.value.url = '';
        model.value.external = external.value;
    }
);

const isOpen = ref<boolean>(false);

const init = () => {
    model.value = props.modelValue;
    model.value.external = external.value;
    isOpen.value = true;
};

const submit = () => {
    emit('update:modelValue', model.value);
    isOpen.value = false;
};
</script>
