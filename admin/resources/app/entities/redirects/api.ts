import {
    RedirectFormData,
    RedirectIndexResource,
    RedirectResource,
} from '@/types';

import {
    client,
    LoadOne,
    LoadMany,
    UpdateOrCreate,
    Delete,
} from '@/modules/api';

const loadRedirect: LoadOne<RedirectResource> = id =>
    client.get(`redirects/${id}`);

const loadRedirects: LoadMany<RedirectIndexResource> = params =>
    client.get(`redirects`, { params });

const updateOrCreateRedirect: UpdateOrCreate<RedirectFormData> = (
    data,
    id = undefined
) =>
    id
        ? client.put(`redirects/${id}`, data)
        : client.post(`redirects`, data);

const deleteRedirect: Delete = id => client.delete(`redirects/${id}`);

export { loadRedirect, loadRedirects, updateOrCreateRedirect, deleteRedirect };
