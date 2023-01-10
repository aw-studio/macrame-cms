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
            <h2 class="mb-5">Introtext</h2>
            <SectionTextFullForm v-model="pageForm.attributes.intro_text" />
        </section>
        <section>
            <h2 class="mb-5">Hervorgehobene Meldungen</h2>
            <Card>
                <div class="text-center">
                    Hier werden die 12 aktuellsten Meldungen angezeigt.
                </div>
            </Card>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { Input, Card, Link } from '@/ui';

import { pageForm } from '@/entities';
import SectionTextFullForm from '@/modules/content/elements/TextFull/SectionTextFullForm.vue';
import { onMounted } from 'vue';

onMounted(() => {
    if (pageForm.value.attributes.foo === undefined) {
        pageForm.value.attributes.foo = {
            bar: {
                baz: 'boom',
            },
        };
    }
});
</script>
