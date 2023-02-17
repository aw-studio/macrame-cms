import { DefineComponent } from 'vue';
import DefaultTemplate from './DefaultTemplate.vue';
import HomeTemplate from './HomeTemplate.vue';
import PostsTemplate from './PostsTemplate.vue';
import EventsTemplate from './EventsTemplate.vue';
import ContactTemplate from './ContactTemplate.vue';

type Template = {
    [k: string]: DefineComponent<{}, {}, any>;
};

const templates: Template = {
    default: DefaultTemplate,
    home: HomeTemplate,
    posts: PostsTemplate,
    events: EventsTemplate,
    contact: ContactTemplate,
};

const templateOptions = [
    {
        label: 'Standard',
        value: 'default',
    },
    {
        label: 'Startseite',
        value: 'home',
    },
    {
        label: 'Beiträge Übersicht',
        value: 'posts',
    },
    {
        label: 'Veranstaltungen Übersicht',
        value: 'events',
    },
    {
        label: 'Kontaktpersonen',
        value: 'contact',
    },
];

const hasContent = (template: string) => {
    return (
        {
            home: false,
            events: false,
            contact: false,
        }[template] !== false
    );
};

export { DefaultTemplate, templateOptions, templates, hasContent };
