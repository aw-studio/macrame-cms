import {
    PersonFormData,
    PersonIndexResource,
    PeopleIndexResource,
} from '@/types';

import {
    client,
    LoadOne,
    LoadMany,
    Delete,
    UpdateOrCreate,
} from '@/modules/api';

const loadPerson: LoadOne<PersonIndexResource> = id =>
    client.get(`people/${id}`);

const loadPeople: LoadMany<PeopleIndexResource> = params =>
    client.get(`people`, { params });

const updateOrCreatePerson: UpdateOrCreate<PersonFormData> = (
    data,
    id = undefined
) => (id ? client.put(`people/${id}`, data) : client.post(`people`, data));

const deletePerson: Delete = id => client.delete(`people/${id}`);

export { loadPerson, loadPeople, updateOrCreatePerson, deletePerson };
