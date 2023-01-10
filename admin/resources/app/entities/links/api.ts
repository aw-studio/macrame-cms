import { LinkCollectionResource } from '@/types';
import { client, LoadMany } from '@/modules/api';

const loadLinks: LoadMany<LinkCollectionResource> = () => client.get(`links`);

export { loadLinks };
