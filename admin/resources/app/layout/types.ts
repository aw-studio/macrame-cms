export type SidebarSection = {
    title: string;
    items: SidebarSectionItem[];
};

export type SidebarSectionItem = {
    title: string;
    to: string;
    icon: any;
    show: boolean;
};
