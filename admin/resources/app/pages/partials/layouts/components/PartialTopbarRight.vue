<template>
    <div class="flex items-center space-x-6">
        <div class="flex items-center space-x-2">
            <SelectLocale />
        </div>
        <SaveButton :disabled="!partialForm.isDirty" @save="partialForm.submit()"/>
    </div>
</template>
<script lang="ts" setup>
import { SelectLocale } from '@/modules/localize';
import { partialForm } from '@/entities';
import { Button } from '@/ui';
import { SaveButton } from '@/modules/save';

</script>
