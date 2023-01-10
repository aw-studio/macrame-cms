import { useForm } from '@macramejs/macrame-vue3';
import { loadEvent, updateOrCreateEvent } from './api';
import { EventForm } from '@/types';

export type UseEventForm = () => EventForm;

// TODO: type
const useEventForm = () => {
    return useForm({
        data: {
            slug: '',
            attributes: {
                title: '',
                text: '',
                excerpt: '',
                location: '',
            },
            starts_at: {
                readable_diff: '',
                original: '',
                iso: '',
                formatted: '',
                label: '',
            },
            ends_at: {
                readable_diff: '',
                original: '',
                iso: '',
                formatted: '',
                label: '',
            },
        },
        submit: (data, id) => updateOrCreateEvent(data, id),
        load: id => loadEvent(id),
        transform: data => {
            return {
                ...data,
                starts_at: data.starts_at.iso,
                ends_at: data.ends_at.iso,
            };
        },
    });
};

const eventForm = useEventForm();

export { useEventForm, eventForm };
