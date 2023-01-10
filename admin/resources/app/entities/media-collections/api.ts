import {
    MediaCollectionResource,
    MediaCollectionIndexResource,
    MediaCollectionFormData,
    MediaCollectionUploadFormData,
    MediaCollectionRemoveFormData,
    MediaCollectionAddFormData,
} from '@/types';
import {
    client,
    LoadOne,
    LoadMany,
    UpdateOrCreate,
    Delete,
    Create,
    Update,
} from '@/modules/api';

const loadMediaCollection: LoadOne<MediaCollectionResource> = id =>
    client.get(`media-collections/${id}`);

const loadMediaCollections: LoadMany<MediaCollectionIndexResource> = params =>
    client.get(`media-collections`, { params });

const updateOrCreateMediaCollection: UpdateOrCreate<MediaCollectionFormData> = (
    data,
    id = undefined
) =>
    id
        ? client.put(`media-collections/${id}`, data)
        : client.post(`media-collections`, data);

const uploadFilesToMediaCollection: Update<MediaCollectionUploadFormData> = (
    data,
    id
) => client.post(`media-collections/${id}/upload`, data);

const removeFilesFromMediaCollection: Update<MediaCollectionRemoveFormData> = (
    data,
    id
) => client.post(`media-collections/${id}/remove`, data);

const addFilesToMediaCollection: Update<MediaCollectionAddFormData> = (
    data,
    id
) => client.post(`media-collections/${id}/add`, data);

const deleteMediaCollection: Delete = id =>
    client.delete(`media-collections/${id}`);

export {
    loadMediaCollection,
    loadMediaCollections,
    updateOrCreateMediaCollection,
    uploadFilesToMediaCollection,
    removeFilesFromMediaCollection,
    addFilesToMediaCollection,
    deleteMediaCollection,
};
