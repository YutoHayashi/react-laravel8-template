import { Models } from '@/models/Models';
import { Permissions } from '@/permissions/Permissions';
export type Meta = {
    email: string;
    name: string;
    is_admin: boolean;
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
        return new User( { email: '', name: '', is_admin: false, } );
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
