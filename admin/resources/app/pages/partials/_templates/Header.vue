<template>
    <Card>
        <FormGroup>
            <h2>Header Logo</h2>
            <SelectImage v-model="partialForm.attributes.logo" />
        </FormGroup>
    </Card>
    <slot />
</template>

<script lang="ts" setup>
import { partialForm } from '@/entities';
import { Input, FormGroup, Card } from '@/ui';
import SelectImage from '@/modules/media/SelectImage.vue';
import { locale } from '@/modules/localize';
import { translatable } from '@macramejs/macrame-vue3';

const claim = translatable<string>(
    locale as any,
    partialForm.attributes.claim,
    value => (partialForm.attributes.claim = value)
);
</script>
