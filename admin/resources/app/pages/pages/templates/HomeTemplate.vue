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
            <h2 class="mb-5">Hervorgehobene Beiträge</h2>
            <Card>
                <div class="text-center">
                    Hier werden die {{pageForm.attributes.posts_count}} aktuellsten Beiträge angezeigt.
                </div>
                 <Input
                        label="Anazhl der Beiträge"
                        type="number"
                        v-model="pageForm.attributes.posts_count"
                    />
            </Card>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { Input, Card, Link } from '@/ui';

import { pageForm } from '@/entities';
import { SectionTextFullForm } from '@/modules/content';
import { onMounted } from 'vue';

onMounted(() => {
    if (pageForm.value.attributes.posts_count === undefined) {
        pageForm.value.attributes.posts_count = 12
    }
});
</script>
