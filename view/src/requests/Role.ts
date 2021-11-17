import { instance, Credentials } from './requests';
import { Role, Meta } from '@/models/Role';
import { ResponseBody } from '@/responses/types';
/**
 * Get roles
 * @param param0 Json Web Token
 * @returns Roles
 */
export const fetch: ( params: { token: string } ) => Promise<Array<Role>> =
( { token } ) => {
    return instance.get<ResponseBody<{ roles: Array<Meta> }>>(
        '/roles',
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => response.data.data._embedded.roles.map( role => new Role( role ) ) );
};
/**
 * Save role
 * @param params Role name and JWT
 * @returns New role
 */
export const save: ( role: Role, token: string ) => Promise<Role> =
( role, token ) => {
    const data = new FormData(  );
    const params = role.parameters<Meta>( [ 'id', 'name', 'guard_name' ] );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( `${ k }`, `${ params[ k ] }` ) );
    return instance.post<ResponseBody<{ role: Meta; }>>(
        '/roles/save',
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => new Role( response.data.data._embedded.role ) );
};
/**
 * Update role
 * @param params Role parameter and JWT
 * @returns Updated role
 */
export const update: ( role: Role, token: string ) => Promise<Role> = ( role, token ) => {
    const data = new FormData(  );
    const params = role.parameters<Meta>( [ 'id', 'name', 'guard_name' ] );
    ( Object.keys( params ) as ( keyof typeof params )[] ).forEach( k => data.append( `${ k }`, `${ params[ k ] }` ) );
    return instance.put<ResponseBody<{ role: Meta; }>>(
        `/roles/${ params.id }`,
        data,
        {
            headers: {
                ...Credentials( { token, } ),
            },
        },
    )
        .then( response => new Role( response.data.data._embedded.role ) );
};
/**
 * Destroy role
 * @param params Role id and JWT
 * @returns 
 */
export const destroy: ( role: Role, token: string ) => Promise<void> = ( role, token ) => {
    const id = role.parameters<Pick<Meta, 'id'>>( [ 'id' ] ).id;
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

