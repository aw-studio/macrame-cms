import {
    BlockResource,
    BlockCollectionIndexResource,
    BlockFormData,
} from '@/types';
import {
    LoadOne,
    LoadMany,
    UpdateOrCreate,
    Delete,
    client,
} from '@/modules/api';

const loadBlock: LoadOne<BlockResource> = id => client.get(`blocks/${id}`);

const loadBlocks: LoadMany<BlockCollectionIndexResource> = params =>
    client.get(`blocks`, { params });

const updateOrCreateBlock: UpdateOrCreate<BlockFormData> = (
    data,
    id = undefined
) => (id ? client.put(`blocks/${id}`, data) : client.post('blocks', data));

const deleteBlock: Delete = id => client.delete(`blocks/${id}`);

export { loadBlock, loadBlocks, deleteBlock, updateOrCreateBlock };
