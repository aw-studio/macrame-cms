import { useForm } from '@macramejs/macrame-vue3';
import { loadBlock, updateOrCreateBlock } from './api';
import { BlockForm, BlockFormData } from '@/types';
import { Ref, ref } from 'vue';

export type UseBlockForm = (
    data: Partial<BlockFormData> & { id?: number | undefined }
) => BlockForm;

const useBlockForm: UseBlockForm = ({
    name = '',
    content = [],
    id = undefined,
}) => {
    return useForm({
        data: {
            name,
            content,
        },
        submit: data => updateOrCreateBlock(data, id),
        load: id => loadBlock(id as number),
    });
};

const blockForm = ref<BlockForm>() as Ref<BlockForm>;

export { useBlockForm, blockForm };
