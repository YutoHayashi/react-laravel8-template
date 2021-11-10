import { instance } from './requests';
import { Meta as UserMeta } from '@/models/User';
import { ResponseBody, TokenResource } from '@/responses/types';
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
    return instance.post<ResponseBody<TokenResource>>(
        '/login',
        data,
    )
        .then( response => {
            const { type, token } = response.data.data._embedded;
            return {
                token: `${ type } ${ token }`,
            };
        } );
};
