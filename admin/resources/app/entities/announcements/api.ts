import {
    AnnouncementFormData,
    AnnouncementIndexResource,
    AnnouncementResource,
} from '@/types';

import { client, LoadOne, LoadMany, UpdateOrCreate, Delete } from '@/modules/api';

const loadAnnouncement: LoadOne<AnnouncementResource> = id =>
    client.get(`announcements/${id}`);

const loadAnnouncements: LoadMany<AnnouncementIndexResource> = params =>
    client.get(`announcements`, { params });

const updateOrCreateAnnouncement: UpdateOrCreate<AnnouncementFormData> = (
    data,
    id = undefined
) =>
    id
        ? client.put(`announcements/${id}`, data)
        : client.post(`announcements`, data);

const deleteAnnouncement: Delete = id => client.delete(`announcements/${id}`);

export { loadAnnouncement, loadAnnouncements, updateOrCreateAnnouncement,deleteAnnouncement };
