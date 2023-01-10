<template>
    <FormField v-bind="$attrs">
        <CheckboxField v-bind="$attrs" />
    </FormField>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import FormField from './FormField.vue';
import CheckboxField from './FormField.vue';

export default defineComponent({
    components: { CheckboxField, FormField },
});
</script>
