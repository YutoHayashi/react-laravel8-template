import { Models } from '@/models/Models';
import { Permissions } from '@/permissions/Permissions';
export type Meta = {
    id: number;
    email: string;
    name: string;
    is_admin: boolean;
    is_active: boolean;
};
export interface User {
    meta: Meta;
    hasPerm: ( perms: Permissions[] ) => boolean;
}
/**
 * User model
 * @param meta User data
 */
export const User = class extends Models implements User {
    /**
     * Generate a user with no information.
     * @returns User
     */
    public static plane(  ) {
        return new User( { id: 0, email: '', name: '', is_admin: false, is_active: true, } );
    }
    public hasPerm( perms: Permissions[] ) {
        return false;
    }
    public constructor(
        public meta: Meta
    ) {
        super(  );
    }
}
