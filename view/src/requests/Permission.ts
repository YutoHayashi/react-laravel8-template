import { instance, Credentials } from './requests';
import { Meta as PermissionMeta } from '@/models/Permission';
import { ResponseBody } from '@/responses/types';
/**
 * Get permissions
 * @param param0 Json Web Token
 * @returns permissions
 */
export const index: ( params: { token: string } ) => Promise<Array<PermissionMeta>> = ( { token } ) => {
    return instance.get<ResponseBody<{ permissions: Array<PermissionMeta> }>>(
        '/permissions',
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.permissions );
};
/**
 * Save permission
 * @param params Permission name and JWT
 * @returns New permission
 */
export const save: ( params: Pick<PermissionMeta, 'name'> & { token: string; } ) => Promise<PermissionMeta> = params => {
    const { token } = params;
    const data = new FormData(  );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( k, params[ k ] ) );
    return instance.post<ResponseBody<{ permission: PermissionMeta; }>>(
        '/permissions',
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.permission );
};
/**
 * Update permission
 * @param params Permission parameters and JWT
 * @returns Updated permission
 */
export const update: ( params: Partial<Pick<PermissionMeta, 'id' | 'name'>> & { token : string; } ) => Promise<PermissionMeta> = params => {
    const { token, id } = params;
    const data = new FormData(  );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( k, String( params[ k ] ) ) );
    return instance.put<ResponseBody<{ permission: PermissionMeta; }>>(
        `/permissions/${ id }`,
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.permission );
};
/**
 * Destroy permission
 * @param params Permission's id and JWT
 * @returns nothing
 */
export const destroy: ( params: Pick<PermissionMeta, 'id'> & { token: string; } ) => Promise<void> = params => {
    const { token ,id } = params;
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
