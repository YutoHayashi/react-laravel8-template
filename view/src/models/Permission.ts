import { Models } from './Models';
export type Meta = {
    id: number;
    name: string;
    guard_name: string;
};
export interface Permission {
    meta: Meta;
}
export const Permission = class extends Models implements Permission {
    public static plane(  ) {
        return new Permission( { id: 0, name: '', guard_name: '', } );
    }
    public constructor(
        public meta: Meta,
    ) {
        super(  );
    }
}
