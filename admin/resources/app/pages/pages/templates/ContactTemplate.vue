<template>
    <div class="my-6 space-y-10">
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
            <h2 class="mb-5">Personensuche</h2>
            <Card class="flex justify-center">
                Hier wird die Personen Suche automatisch geladen
            </Card>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { Input, Card } from '@/ui';

import { pageForm } from '@/entities';
</script>
