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
export const login: ( params: Pick<Meta, 'email'> & { password: string; } ) => Promise<{ token: string; }> =
async params => {
    const data = new FormData(  );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( k, params[ k ] ) );
    return instance.post<ResponseBody<TokenResource>>(
        `/login`,
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
export const me: ( params: { token: string } ) => Promise<User> =
async ( { token } ) => {
    return instance.get<ResponseBody<{ user: Meta; }>>(
        `/me`,
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
export const refresh: ( params: { token: string } ) => Promise<{ token: string }> =
async ( { token } ) => {
    return instance.get<ResponseBody<TokenResource>>(
        `/refresh`,
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
export const logout: ( params: { token: string; } ) => Promise<void> =
async ( { token } ) => {
    return instance.post<ResponseBody>(
        `/logout`,
        undefined,
        {
            headers: {
                ...Credentials( { token } ),
            },
        },
    )
        .then( response => undefined );
};
/**
 * Send an email to reset password
 * @param param0 email address
 * @returns void
 */
export const sendResettingToken: ( params: Pick<Meta, 'email'> ) => Promise<void> =
async ( { email = '' } ) => {
    const data = new FormData(  );
    data.append( 'email', email );
    return instance.post<ResponseBody>(
        `/send_password_reset`,
        data,
    )
        .then( response => undefined );
};
/**
 * Reset password
 * @param param0 password / token 
 * @returns void 
 */
export const resetPassword: ( params: Pick<Meta, 'password'> & { token: string } ) => Promise<void> =
async ( { token, password = '' } ) => {
    const data = new FormData(  );
    data.append( 'password', password );
    data.append( 'token', token );
    return instance.post<ResponseBody>(
        `/password_reset`,
        data,
    )
        .then( response => undefined );
};
