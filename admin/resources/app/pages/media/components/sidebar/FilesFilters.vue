<template>
    <div class="py-4">
        <Input v-model.debounce="mediaIndex.search" />
        <div class="pt-4">
            <Checkbox
                v-model="mediaIndex.filters.types.value"
                value="images"
                field-id="1"
            >
                {{ $t('media.images') }}
            </Checkbox>
            <Checkbox
                v-model="mediaIndex.filters.types.value"
                value="documents"
                field-id="2"
            >
                {{ $t('media.documents') }}
            </Checkbox>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { Input, Checkbox } from '@/ui';
import { mediaIndex } from '@/entities';

mediaIndex.reloadOnChange(mediaIndex.filters);
</script>
