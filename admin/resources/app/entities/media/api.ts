import { MediaResource, MediaIndexResource } from '@/types';
import { client, LoadOne, LoadMany, Delete, Create } from '@/modules/api';

const loadMediaItem: LoadOne<MediaResource> = id => client.get(`media/${id}`);

const loadMediaItems: LoadMany<MediaIndexResource> = params =>
    client.get(`media/items`, { params });

const deleteMedia: Delete = id => client.delete(`media/${id}`);

const deleteMultipleMediaItems: Create<{ ids: number[] }> = data =>
    client.post(`media/delete`, data);

export { loadMediaItem, loadMediaItems, deleteMedia, deleteMultipleMediaItems };
