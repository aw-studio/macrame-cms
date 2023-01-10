<template>
    <div class="my-6 space-y-12">
        <section>
            <h2 class="mb-5">H1 Überschrift</h2>
            <Card>
                <Input
                    label="H1 - Überschrift"
                    v-model="pageForm.attributes.h1"
                />
            </Card>
        </section>
        <section>
            <h2 class="mb-5">Meldungen</h2>
            <Card class="flex justify-center">
                <h3>Hier werden Meldungen automatisch angezeigt.</h3>
            </Card>
        </section>
        <slot />
    </div>
</template>

<script lang="ts" setup>
import { Input, Card } from '@/ui';

import { pageForm } from '@/entities';
</script>
