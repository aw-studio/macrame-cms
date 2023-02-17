import {
    RawTreeItem,
    IndexResource,
    TreeResource,
} from '@macramejs/macrame-vue3';
export type Resource<Model> = { data: Model };
export type CollectionResource<Model> = { data: Model[] };

// DateTime

export type DateTime = {
    readable_diff: string;
    original: string;
    iso: string;
    formatted: string;
    label: string;
};
export type DateTimeResource = Resource<DateTime>;

// State

export type State = {
    label: string;
    value: string;
};
export type StateResource = Resource<State>;
export type StatesCollectionResource = CollectionResource<State>;

// User
export interface User {
    id: number;
    name: string;
    email: string;
    is_admin: boolean;
    created_at: DateTime;
    update_at: DateTime;
}
export type UserResource = Resource<User>;
export type UserCollectionResource = CollectionResource<User>;

// Redirects
export interface Redirect {
    id: number;
    from_url: string;
    to_url: string;
    http_status_code: number;
    active: boolean;
}
export type RedirectResource = Resource<Redirect>;
export type RedirectCollectionResource = CollectionResource<Redirect>;
export type RedirectIndexResource = IndexResource<Redirect>;

// Media

export type Media = {
    id: number;
    display_name: string;
    group: string;
    disk: string;
    filepath: string;
    filename: string;
    mimetype: string;
    size: number;
    url?: string;
};
export type MediaResource = Resource<Media>;
export type MediaIndexResource = IndexResource<Media>;

// MediaCollection

export type MediaCollection = {
    id: number;
    title: string;
    key: string;
};
export type MediaCollectionResource = Resource<MediaCollection>;
export type MediaCollectionCollectionResource =
    CollectionResource<MediaCollection>;
export type MediaCollectionIndexResource = IndexResource<MediaCollection>;

// Page

export type Page = {
    content: { [key: string]: any }[];
    attributes: { [key: string]: any };
    id: number;
    name: string;
    slug: string;
    template: string;
    full_slug: string;
    is_live: boolean;
    parent_id: number;
    publish_at: string;
    has_been_published: boolean;
    preview_key: string;
    meta: {
        title: string;
        description: string;
    };
};

export type PageResource = Resource<Page>;
export type PageCollectionResource = CollectionResource<Page>;
export type PageCollectionIndexResource = IndexResource<Page>;

// PageTree
export type PageTreeItem = RawTreeItem<Page>;
export type PageTreeResource = TreeResource<Page>;

// Menu

export type Menu = {
    id: number;
    title: string;
    type: string;
};
export type MenuResource = Resource<Menu>;
export type MenuCollectionResource = CollectionResource<Menu>;

export interface MenuItem {
    id: number;
    title: string;
    link: string;
    is_public: boolean;
}

export type MenuItemTreeResource = TreeResource<MenuItem>;

export type Link = {
    link: string;
    title: string;
};
export type LinkResource = Resource<Link>;
export type LinkCollectionResource = CollectionResource<Link>;

// Block
export type Block = {
    id?: number;
    content: { [key: string]: any }[];
    name: string;
};

export type BlockResource = Resource<Block>;
export type BlockCollectionResource = CollectionResource<Block>;
export type BlockCollectionIndexResource = IndexResource<Block>;

// Partial
export interface Partial {
    id: number;
    attributes: { [k: string]: any };
    template: string;
    name: string;
    created_at: DateTime;
    update_at: DateTime;
}
export type PartialResource = Resource<Partial>;
export type PartialCollectionResource = CollectionResource<Partial>;

// Stored

export type StoredResource = Resource<{ id: number }>;

// SystemUser
export interface SystemUser {
    id: number;
    name: string;
    email: string;
    is_admin: boolean;
    has_verified_email: boolean;
}
export type SystemUserResource = Resource<SystemUser>;
export type SystemUserCollectionResource = CollectionResource<SystemUser>;
export type SystemUserIndexResource = IndexResource<SystemUser>;

// Post
export interface Post {
    id: number;
    attributes: {
        title: string;
        text: string;
        image: {
            id: number;
            alt: string;
            title: string;
        };
    };
    author: {
        id: number;
        name: string;
    };
    publish_at: DateTime | undefined;
    unpublish_at: DateTime | undefined;
    feature_until: DateTime | undefined;
    is_featured: boolean;
    is_pinned: boolean;
}
export type PostResource = Resource<Post>;
export type PostCollectionResource = CollectionResource<Post>;
export type PostIndexResource = IndexResource<Post>;

export interface Event {
    id: number;
    slug: string;
    attributes: {
        title: string;
        excerpt: string;
        text: string;
        location: string;
    };
    starts_at: DateTime | undefined;
    ends_at: DateTime | undefined;
}
export type EventResource = Resource<Event>;
export type EventCollectionResource = CollectionResource<Event>;
export type EventIndexResource = IndexResource<Event>;

interface Image {
    id: number;
    title: string;
    alt: string;
}

export interface Person {
    id: number;
    name: string;
    phone: string;
    email: string;
    description: string;
    image: Image;
}

export type PersonResource = Resource<Person>;
export type PersonCollectionResource = CollectionResource<Person>;
export type PersonIndexResource = IndexResource<Person>;
export type PeopleIndexResource = IndexResource<Person>;
