<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-16 border-b border-gray-400">
        <h2 class="mb-4 text-xl font-semibold col-span-full">Modal.vue</h2>
        <div class="col-span-full md:col-span-1">
            <div class="flex flex-wrap gap-5 mb-10">
                <ButtonPrimary v-if="variant == 'sm'" @click="modalSM = true"
                    >Open Modal sm</ButtonPrimary
                >
                <ButtonPrimary v-if="variant == 'md'" @click="modalMD = true"
                    >Open Modal MD</ButtonPrimary
                >
                <ButtonPrimary v-if="variant == 'lg'" @click="modalLG = true"
                    >Open Modal LG</ButtonPrimary
                >
                <ButtonPrimary v-if="variant == 'xl'" @click="modalXL = true"
                    >Open Modal XL</ButtonPrimary
                >
                <Modal v-model:open="modalSM" title="Test SM" sm> Test </Modal>
                <Modal v-model:open="modalMD" title="Test MD" md> Test </Modal>
                <Modal v-model:open="modalLG" title="Test LG" lg> Test </Modal>
                <Modal v-model:open="modalXL" title="Test XL" xl> Test </Modal>
            </div>
            <Select
                class="mt-8"
                label="Variant"
                v-model="variant"
                :options="variantOptions"
            />
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                :value="`<ButtonPrimary @click=&quot;modal = true&quot;>
    Open Modal
</ButtonPrimary>
<Modal v-model:open=&quot;modal&quot; title=&quot;Test&quot; ${variant}>
    Test
</Modal>`"
                label="Template"
            />
            <CopyString :value="`const modal = ref(false);`" label="Script" />
        </div>
        <table
            class="table p-5 mt-10 bg-orange-100 border border-orange-300 col-span-full"
        >
            <thead class="text-left border-b border-orange-300">
                <th class="py-5 pl-5">Prop</th>
                <th class="py-5">Default</th>
                <th class="py-5 pr-5">Description</th>
            </thead>
            <tbody>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">open</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        determines wether the modal is visible or not
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">title</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">title of the modal content</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">sm</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">sets max width of modal to 576px</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">md</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">sets max width of modal to 672px</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">lg</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">sets max width of modal to 768px</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { Modal, ButtonPrimary, Select } from '@/ui';
import { computed, ref } from 'vue';
import CopyString from '../CopyString.vue';

const modalSM = ref(false);
const modalMD = ref(false);
const modalLG = ref(false);
const modalXL = ref(false);

const variant = ref('lg');
const variantOptions = [
    { value: 'sm', label: 'SM' },
    { value: 'md', label: 'MD' },
    { value: 'lg', label: 'LG' },
    { value: 'xl', label: 'XL' },
];

const shownSize = computed(() => {
    if (variant.value == 'sm') {
        return 'SM';
    }
    if (variant.value == 'md') {
        return 'MD';
    }
    if (variant.value == 'lg') {
        return 'LG';
    }
    if (variant.value == 'xl') {
        return 'XL';
    }
});
</script>
