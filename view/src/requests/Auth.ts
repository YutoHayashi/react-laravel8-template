import { instance } from './requests';
import { Meta as UserMeta } from '@/models/User';
/**
 * Send a login request and receive a JSON Web Token.
 * @param params User's email address and password
 * @returns JSON Web Token
 * @example
 * ```ts
 *  const token = await login( { email, password } );
 * ```
 */
export const login: ( params: Pick<UserMeta, 'email'> & { password: string; } ) => Promise<{ token: string; }> = params => {
    const data = new FormData(  );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( k, params[ k ] ) );
    return instance.post<{ token: string; }>(
        '/login',
        data,
    )
        .then( response => response.data );
};
