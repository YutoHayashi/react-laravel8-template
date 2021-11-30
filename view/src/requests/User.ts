import { instance, Credentials } from './requests';
import { User, Meta } from '@/models/User';
import { ResponseBody } from '@/responses/types';
/**
 * Fetch user.
 * @param token JSON Web Token
 * @returns Users
 * @example
 * ```ts
 * const users = await fetch( { token, } );
 * ```
 */
export const fetch: ( payload: { token: string; conditions?: { [ K: string ]: string | number | boolean }; } ) => Promise<Array<User>> =
async ( { token, conditions = {  }, } ) => {
    const query = ( Object.keys( conditions ) as string[] ).map( k => `${ k }=${ conditions[ k ] }` ).reduce( ( p, c ) => `${ p }&${ c }` );
    return instance.get<ResponseBody<{ users: Array<Meta> }>>(
        `/users?${ query }`,
        {
            headers: {
                ...Credentials( { token } ),
            },
        },
    )
        .then( response => response.data.data._embedded.users.map( u => new User( u ) ) );
};
/**
 * Store user
 * @param user User
 * @param token JSON Web Token
 * @returns User
 * @example
 * ```ts
 * const user = await store( { user: new User( attributes ), token, } );
 * ```
 */
export const store: ( payload: { user: User; token: string; } ) => Promise<User> =
async ( { user, token, } ) => {
    const parameters = user.parameters<Pick<Meta, 'email' | 'name' | 'password'>>( [ 'email', 'name', 'password' ] );
    const data = new FormData(  );
    ( Object.keys( parameters ) as ( keyof typeof parameters )[] ).forEach( k => data.append( k, parameters[ k ] as string | Blob ) );
    return instance.post<ResponseBody<{ user: Meta }>>(
        `/users`,
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => new User( response.data.data._embedded.user ) );
};
/**
 * Update user.
 * @param user User
 * @param token JSON Web Token
 * @returns User
 * @example
 * ```ts
 * const user = await update( { user, token, } );
 * ```
 */
export const update: ( payload: { user: User; token: string; } ) => Promise<User> =
async ( { user, token, } ) => {
    const parameters = user.parameters<Pick<Meta, 'email' | 'name'>>( [ 'email', 'name' ] );
    const { id = `` } = user.parameters<Pick<Meta, 'id'>>( [ 'id' ] );
    const data = new FormData(  );
    ( Object.keys( parameters ) as ( keyof typeof parameters )[] ).forEach( k => data.append( k, parameters[ k ] as string | Blob ) );
    return instance.put<ResponseBody<{ user: Meta }>>(
        `/users/${ id }`,
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            }
        },
    )
        .then( response => new User( response.data.data._embedded.user ) );
};
/**
 * Destroy user.
 * @param user User
 * @param token JSON Web Token
 * @returns null
 * @example
 * ```ts
 * destroy( { user, token, } );
 * ```
 */
export const destroy: ( payload: { user: User; token: string; } ) => Promise<null> =
async ( { user, token, } ) => {
    const { id = `` } = user.parameters<Pick<Meta, 'id'>>( [ 'id' ] );
    return instance.delete<ResponseBody<{}>>(
        `/users/${ id }`,
        {
            headers: {
                ...Credentials( { token } ),
            },
        },
    )
        .then( response => null );
};
/**
 * Restore user
 * @param user User
 * @param token JSON Web Token
 * @returns User
 * @example
 * ```ts
 * const restored = await restore( { user, token, } );
 * ```
 */
export const restore: ( payload: { user: User; token: string; } ) => Promise<User> =
async ( { user, token, } ) => {
    const { id = `` } = user.parameters<Pick<Meta, 'id'>>( [ 'id' ] );
    return instance.post<ResponseBody<{ user: User }>>(
        `/users/restore/${ id }`,
        undefined,
        {
            headers: {
                ...Credentials( { token } ),
            },
        },
    )
        .then( response => new User( response.data.data._embedded.user ) );
};
/**
 * Verify user email
 * @param param0 email verification token
 * @returns void
 * @example
 * ```ts
 * verify( { email_verification_token } );
 * ```
 */
export const verify: ( payload: { email_verification_token: string } ) => Promise<void> =
async ( { email_verification_token } ) => {
    return instance.get<ResponseBody>(
        `/verify?email_verification_token=${ email_verification_token }`,
    )
        .then( response => undefined );
};
