<template>
    <div class="my-6 space-y-4">
        <Input label="H1 - Überschrift" v-model="pageForm.attributes.h1" />
    </div>
    <slot />
</template>

<script lang="ts" setup>
import { Input } from '@/ui';

import { pageForm } from '@/entities';
import { translatable } from '@macramejs/macrame-vue3';
import { locale } from '@/modules/localize';

const h1 = translatable<string>(
    locale as any,
    pageForm.value.attributes.h1,
    value => (pageForm.value.attributes.h1 = value)
);
</script>
