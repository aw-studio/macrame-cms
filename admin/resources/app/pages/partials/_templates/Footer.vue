<template>
    <FormGroup>
        <Input label="E-Mail" v-model="partialForm.attributes.email" />
        <Input label="Telefon" v-model="partialForm.attributes.phone" />
    </FormGroup>
    <slot />
</template>

<script lang="ts" setup>
import { Input, FormGroup } from "@/ui";
import { partialForm } from '@/entities';

</script>
