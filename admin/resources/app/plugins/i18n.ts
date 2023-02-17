import { createI18n } from 'vue-i18n';
import { merge } from 'lodash';
import { messages as auth } from '@/pages/auth/lang';
import { messages as pages } from '@/pages/pages/lang';
import { messages as media } from '@/pages/media/lang';
import { messages as menus } from '@/pages/menus/lang';
import { messages as partials } from '@/pages/partials/lang';
import { messages as posts } from '@/pages/posts/lang';
import { messages as events } from '@/pages/events/lang';
import { messages as people } from '@/pages/people/lang';
import { messages as content } from '@/modules/content/lang';
import { messages as blocks } from '@/pages/blocks/lang';
import { messages as layout } from '@/layout/lang';
import { messages as ui } from '@/ui/lang';
import { messages as system } from '@/pages/system/lang';
import { messages as redirects } from '@/pages/redirects/lang';

const translations = [
    auth,
    pages,
    media,
    content,
    blocks,
    layout,
    menus,
    partials,
    posts,
    events,
    people,
    ui,
    redirects,
    system,
];

let messages = {};

translations.forEach(translation => {
    messages = merge(messages, translation);
});

export const i18n = createI18n({
    legacy: false,
    locale: 'de',
    fallbackLocale: 'en',
    messages,
});
