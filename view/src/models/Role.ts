import { Models } from './Models';
export type Meta = {
    id: number;
    name: string;
    guard_name: string;
};
export interface Role extends Models<Meta> {}
export class Role extends Models<Meta> implements Role {
    public id?: number;
    public name?: string;
    public guard_name?: string;
    /**
     * Generate a role with no data
     * @returns Role
     */
    public static plane(  ) {
        return new Role( { id: 0, name: '', guard_name: '', } );
    }
    public constructor(
        public init: Meta,
    ) {
        super(  );
    }
};
