import { instance, Credentials } from './requests';
import { Permission, Meta } from '@/models/Permission';
import { ResponseBody } from '@/responses/types';
/**
 * Get permissions
 * @param param0 Json Web Token
 * @returns permissions
 */
export const index: ( params: { token: string } ) => Promise<Array<Permission>> =
( { token } ) => {
    return instance.get<ResponseBody<{ permissions: Array<Meta> }>>(
        '/permissions',
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.permissions.map( permission => new Permission( permission ) ) );
};
/**
 * Save permission
 * @param params Permission name and JWT
 * @returns New permission
 */
export const save: ( permission: Permission, token: string ) => Promise<Permission> =
( permission, token ) => {
    const data = new FormData(  );
    const params = permission.parameters<Meta>( [ 'id', 'name', 'guard_name' ] );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( `${ k }`, `${ params[ k ] }` ) );
    return instance.post<ResponseBody<{ permission: Meta; }>>(
        '/permissions',
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => new Permission( response.data.data._embedded.permission ) );
};
/**
 * Update permission
 * @param params Permission parameters and JWT
 * @returns Updated permission
 */
export const update: ( permission: Permission, token : string ) => Promise<Permission> =
( permission, token ) => {
    const data = new FormData(  );
    const params = permission.parameters<Meta>( [ 'id', 'name', 'guard_name' ] );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( `${ k }`, `${ params[ k ] }` ) );
    return instance.put<ResponseBody<{ permission: Meta; }>>(
        `/permissions/${ params.id }`,
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => new Permission( response.data.data._embedded.permission ) );
};
/**
 * Destroy permission
 * @param params Permission's id and JWT
 * @returns nothing
 */
export const destroy: ( params: Permission & { token: string; } ) => Promise<void> =
params => {
    const { token, id } = params;
    return instance.delete<ResponseBody>(
        `/permissions/${ id }`,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => undefined );
};
