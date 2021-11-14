import { Models } from './Models';
export type Meta = {
    id: number;
    name: string;
    guard_name: string;
};
export class Permission extends Models<Meta> {
    public id?: number;
    public name?: string;
    public guard_name?: string;
    /**
     * Generate a permission with no data
     * @returns Permission
     */
    public static plane(  ) {
        return new Permission( { id: 0, name: '', guard_name: '', } );
    }
    public constructor(
        public init: Meta,
    ) {
        super(  );
    }
};
