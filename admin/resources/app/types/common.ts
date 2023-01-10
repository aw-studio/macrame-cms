export type OrderItem = {
    id: number;
    children: OrderItem[];
};

export type Order = {
    order: OrderItem[];
};
