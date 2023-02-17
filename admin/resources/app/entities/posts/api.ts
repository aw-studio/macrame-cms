import { PostFormData, PostIndexResource, PostResource } from '@/types';

import {
    client,
    LoadOne,
    LoadMany,
    UpdateOrCreate,
    Delete,
} from '@/modules/api';

const loadPost: LoadOne<PostResource> = id => client.get(`posts/${id}`);

const loadPosts: LoadMany<PostIndexResource> = params =>
    client.get(`posts`, { params });

const updateOrCreatePost: UpdateOrCreate<PostFormData> = (
    data,
    id = undefined
) => (id ? client.put(`posts/${id}`, data) : client.post(`posts`, data));

const deletePost: Delete = id => client.delete(`posts/${id}`);

export { loadPost, loadPosts, updateOrCreatePost, deletePost };
