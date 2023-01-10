import { EventFormData, EventIndexResource, EventResource } from '@/types';

import {
    client,
    LoadOne,
    LoadMany,
    UpdateOrCreate,
    Delete,
} from '@/modules/api';

const loadEvent: LoadOne<EventResource> = id => client.get(`events/${id}`);

const loadEvents: LoadMany<EventIndexResource> = params =>
    client.get(`events`, { params });

const updateOrCreateEvent: UpdateOrCreate<EventFormData> = (
    data,
    id = undefined
) => (id ? client.put(`events/${id}`, data) : client.post(`events`, data));

const deleteEvent: Delete = id => client.delete(`events/${id}`);

export { loadEvent, loadEvents, updateOrCreateEvent, deleteEvent };
