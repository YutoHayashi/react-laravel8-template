import { instance, Credentials } from './requests';
import { Meta as RoleMeta } from '@/models/Role';
import { ResponseBody } from '@/responses/types';
/**
 * Get roles
 * @param param0 Json Web Token
 * @returns Roles
 */
export const fetch: ( params: { token: string } ) => Promise<Array<RoleMeta>> = ( { token } ) => {
    return instance.get<ResponseBody<{ roles: Array<RoleMeta> }>>(
        '/roles',
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.roles );
};
/**
 * Save role
 * @param params Role name and JWT
 * @returns New role
 */
export const save: ( params: Pick<RoleMeta, 'name'> & { token: string; } ) => Promise<RoleMeta> = params => {
    const { token } = params;
    const data = new FormData(  );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( k, params[ k ] ) );
    return instance.post<ResponseBody<{ role: RoleMeta; }>>(
        '/roles/save',
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.role );
};
/**
 * Update role
 * @param params Role parameter and JWT
 * @returns Updated role
 */
export const update: ( params: Partial<Pick<RoleMeta, 'id' | 'name'>> & { token: string; } ) => Promise<RoleMeta> = params => {
    const { token, id } = params;
    const data = new FormData(  );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( k, String( params[ k ] ) ) );
    return instance.put<ResponseBody<{ role: RoleMeta; }>>(
        `/roles/${ id }`,
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.role );
};
/**
 * Destroy role
 * @param params Role id and JWT
 * @returns 
 */
export const destroy: ( params: Pick<RoleMeta, 'id'> & { token: string } ) => Promise<void> = params => {
    const { token, id } = params;
    const data = new FormData(  );
    return instance.delete<ResponseBody>(
        `/roles/${ id }`,
        {
            headers: {
                ...Credentials( { token } ),
            },
        },
    )
        .then( response => undefined );
};

