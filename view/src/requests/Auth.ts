import { instance, Credentials } from './requests';
import { User, Meta } from '@/models/User';
import { ResponseBody, TokenResource } from '@/responses/types';
/**
 * Login
 * @param params User's email address and password
 * @returns JSON Web Token
 * @example
 * ```ts
 *  const token = await login( { email, password } );
 * ```
 */
export const login: ( params: Pick<Meta, 'email'> & { password: string; } ) => Promise<{ token: string; }> = params => {
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
/**
 * Get me
 * @param param0 Json Web Token
 * @returns User
 */
export const me: ( params: { token: string } ) => Promise<User> = ( { token } ) => {
    return instance.get<ResponseBody<{ user: Meta; }>>(
        '/me',
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => new User( response.data.data._embedded.user ) );
};
/**
 * Refresh Token
 * @param param0 Json Web Token
 * @returns TokenResource
 */
export const refresh: ( params: { token: string } ) => Promise<{ token: string }> = ( { token } ) => {
    return instance.get<ResponseBody<TokenResource>>(
        '/refresh',
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => {
            const { token, type } = response.data.data._embedded;
            return {
                token: `${ type } ${ token }`,
            };
        } );
}
/**
 * Logout
 * @param param0 Json Web Token
 * @returns { Promise<void> }
 * @example
 * ```ts
 * logout( { token } )
 * ```
 */
export const logout: ( params: { token: string; } ) => Promise<void> = ( { token } ) => {
    return instance.post<ResponseBody>(
        '/logout',
        undefined,
        {
            headers: {
                ...Credentials( { token } ),
            },
        },
    )
        .then( response => undefined );
};
