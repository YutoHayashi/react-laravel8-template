import { Models } from './Models';
export type Meta = {
    id: number;
    name: string;
    guard_name: string;
};
export interface Role {
    meta: Meta;
}
export const Role = class extends Models implements Role {
    public static plane(  ) {
        return new Role( { id: 0, name: '', guard_name: '', } );
    }
    public constructor(
        public meta: Meta
    ) {
        super(  );
    }
}
