import { Models } from '@/models/Models';
import { Permissions } from '@/permissions/Permissions';
export type Meta = {
    id: string;
    email: string;
    name: string;
    is_admin: boolean;
    password: string;
};
export interface User extends Models<Meta> {
    hasPerm( perms: Permissions[] ): boolean;
}
/**
 * User model
 * @param meta User data
 */
export class User extends Models<Meta> implements User {
    public id?: string;
    public email?: string;
    public name?: string;
    public is_admin?: boolean;
    public password?: string;
    /**
     * Generate a user with no data
     * @returns User
     */
    public static plane(  ) {
        return new User( { id: ``, email: '', name: '', is_admin: false, password: '', } );
    }
    public hasPerm( perms: Permissions[] ) {
        return false;
    }
    public constructor(
        public init?: Partial<Meta>,
    ) {
        super(  );
    }
};
