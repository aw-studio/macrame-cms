import { reactive, ref } from 'vue';
import SelectLocale from './SelectLocale.vue';

const locale = ref('de');

const localize = reactive({
    languages: {
        de: 'Deutsch',
        en: 'Englisch',
    },
    getLanguage(l: string) {
        return this.languages[l as keyof typeof this.languages];
    }
});

export { locale, localize, SelectLocale };