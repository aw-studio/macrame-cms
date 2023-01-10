import { loadMediaItem } from '@/entities';
import { Media } from '@/types/resources';

export { default as MediaUpload } from './MediaUpload.vue';

export const getMediaById = async (id: number) => {
    let media = (await loadMediaItem(id)).data.data;
    return media as Media;
};

export const deleteFile = async (file: Media) => {
    await deleteFile(file);
    return;
};
