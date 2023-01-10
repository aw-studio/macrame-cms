<template>
    <FormGroup>
        <Input v-model="model.text" class="w-full" label="Linktext" />

        <div class="flex items-center space-x-2">
            <span> Externer link </span><Toggle v-model="external" />
        </div>
        <Select
            v-if="!external"
            label="Link"
            v-model="model.url"
            :options="linksState.value"
            label-key="title"
            value-key="link"
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

        <Disclosure v-slot="{ open }">
            <DisclosureButton
                class="transition-colors duration-300 border-b border-gray-700 outline-none hover:border-orange-500 hover:text-orange-500 w-fit"
            >
                {{ open ? 'weniger anzeigen' : 'mehr anzeigen' }}
            </DisclosureButton>
            <DisclosurePanel>
                <Toggle
                    v-model="model.alternative_layout"
                    label="Alternatives Layout"
                />
                <div class="mt-1 text-xs">
                    Passt das Grid Layout der Navigation an, sodass es
                    spaltenweise verläuft. Funktioniert nur bei Punkten der
                    ersten Navigationsebene
                </div>
            </DisclosurePanel>
        </Disclosure>
    </FormGroup>
</template>

<script lang="ts" setup>
import { PropType, ref, watch } from 'vue';
import { Input, Select, Toggle, FormGroup } from '@/ui';
import { linksState } from '@/entities';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';

const emit = defineEmits(['update:modelValue']);

interface Link {
    url: string;
    text: string;
    new_tab: boolean;
    alternative_layout: boolean;
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
    }
);

watch(
    () => model.value,
    val => {
        emit('update:modelValue', model.value);
    }
);
</script>
