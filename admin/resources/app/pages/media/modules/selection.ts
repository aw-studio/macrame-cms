import {
    addFilesToMediaCollection,
    deleteMultipleMediaItems,
    removeFilesFromMediaCollection,
} from '@/entities';
import { Media, MediaCollection } from '@/types';
import { reactive } from 'vue';

export interface Selection {
    files: Media[];
    addToCollection: (collection: MediaCollection) => void;
    delete: () => void;
}

const useSelection = (files: Media[]) => {
    const sel = reactive<Selection>({
        files,
        addToCollection(collection) {
            if (this.files.length === 0) return;

            addFilesToMediaCollection(
                { ids: this.files.map(file => file.id) },
                collection.id
            );
        },
        delete() {
            if (this.files.length === 0) return;

            return deleteMultipleMediaItems({
                ids: this.files.map(file => file.id),
            });
        },
    });

    return sel;
};

const selection = useSelection([]);

export { selection, useSelection };
