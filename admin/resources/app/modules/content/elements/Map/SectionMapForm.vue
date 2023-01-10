<template>
    <Card>
        <FormGroup>
            <div class="grid grid-cols-2 gap-5">
                <Input
                    label="Breitengrad"
                    type="number"
                    placeholder="54.12345"
                    v-model="model.lat"
                />
                <Input
                    label="Längengrad"
                    type="number"
                    placeholder="11.12345"
                    v-model="model.lng"
                />
                <div>
                    <h4>Zoom</h4>
                    <Slider
                        label="Zoom"
                        min="4"
                        max="12"
                        v-model="model.zoom"
                    />
                </div>
                <span>{{ model.zoom }}</span>
            </div>
        </FormGroup>
    </Card>
</template>
<script setup lang="ts">
import { Card, Input, FormGroup, Slider } from '@/ui';

import { watch, reactive, computed } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            lat: null,
            lng: null,
            zoom: 4,
        }),
    },
});

const model = reactive(props.modelValue);

watch(
    () => model,
    () => emit('update:modelValue', model),
    { deep: true }
);
</script>
