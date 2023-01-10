import {
    SystemUserFormData,
    SystemUserIndexResource,
    SystemUserResource,
} from '@/types';

import {
    client,
    LoadOne,
    LoadMany,
    UpdateOrCreate,
    Delete,
} from '@/modules/api';

const loadSystemUser: LoadOne<SystemUserResource> = id =>
    client.get(`system-users/${id}`);

const loadSystemUsers: LoadMany<SystemUserIndexResource> = params =>
    client.get(`system-users`, { params });

const updateOrCreateSystemUser: UpdateOrCreate<SystemUserFormData> = (
    data,
    id = undefined
) =>
    id
        ? client.put(`system-users/${id}`, data)
        : client.post(`system-users`, data);

const deleteSystemUser: Delete = id => client.delete(`system-users/${id}`);

export {
    loadSystemUser,
    loadSystemUsers,
    updateOrCreateSystemUser,
    deleteSystemUser,
};
