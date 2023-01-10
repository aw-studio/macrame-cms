<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">FormField.vue</h2>
            <div class="flex gap-5 mb-10">
                <FormField
                    label="Test"
                    hint="Test"
                    :errors="['Test', 'Test 2']"
                >
                    <Input
                        v-model="input"
                        label="Test"
                        hint="Test"
                        :errors="['Test', 'Test 2']"
                    />
                </FormField>
            </div>
            <div
                class="bg-orange-100 border w-fit border-orange-300 text-darkorange font-code px-3 py-1.5"
            >
                value: {{ input }}
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value='<FormField label="Test" hint="Test" :errors="errors">
    <Input
        v-model="input"
        label="Test"
        hint="Test"
        :errors="errors"
    />
</FormField>'
                label="Template"
            />
            <CopyString
                value="const input = ref(''); 
const errors = ['Test', 'Test 2']"
                label="Script"
            />
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
                    <td class="py-5 pl-5">label</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">sets the label of the input field</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">noLabel</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        disable the form fields own label (if you only want the
                        input label for example)
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">hint</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">
                        sets the hint for the form field at the bottom right
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">errors</td>
                    <td class="py-5 font-code">[]</td>
                    <td class="py-5 pr-5">
                        Array that holds the errors of the field as strings
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { Input, FormField } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const input = ref('');
</script>
