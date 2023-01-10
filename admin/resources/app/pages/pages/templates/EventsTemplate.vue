<template>
    <div class="my-6 space-y-12">
        <section>
            <h2 class="mb-5">H1 Überschrift</h2>
            <Card>
                <FormField no-label>
                    <Input
                        label="H1 - Überschrift"
                        v-model="pageForm.attributes.h1"
                    />
                </FormField>
                <FormField label="Intro Text">
                    <Wysiwyg v-model="pageForm.attributes.text" />
                </FormField>
            </Card>
        </section>
        <section>
            <h2 class="mb-5">Veranstaltungen</h2>
            <Card class="flex justify-center">
                <h3>Hier werden Veranstaltungen automatisch angezeigt.</h3>
            </Card>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { Input, Wysiwyg, Card, FormField } from '@/ui';

import { pageForm } from '@/entities';
</script>
