import React from 'react';
import { User } from '@/models/User';
import { Permissions } from '@/permissions/Permissions';
import { login as loginRequest, logout as logoutRequest } from '@/requests/Auth';
type Props = {};
type States = {
    isAuthenticated: boolean;
    token: string;
    me: User;
    login: typeof login;
    logout: typeof logout;
    check: typeof check;
};
let state: States;
let setState: React.Dispatch<React.SetStateAction<States>>;
const STORAGE_NAME = 'JWT';
/**
 * Auth login handler.
 * @param params login request parameters
 * @returns Promise<void>
 * @example
 * ```ts
 * login( { email, password } );
 * ```
 */
const login: ( params: Parameters<typeof loginRequest>[ 0 ] ) => Promise<void> = params => {
    return loginRequest( params )
        .then( ( { token } ) => {
            setState( { ...state, ...{ token, isAuthenticated: true, } } );
            localStorage.setItem( STORAGE_NAME, token );
        } );
};
/**
 * Auth logout handler.
 * @returns Promise<void>
 * @example
 * ```ts
 * logout(  );
 * ```
 */
const logout: (  ) => Promise<void> = (  ) => {
    return logoutRequest( { token: state.token } )
        .then( (  ) => {
            setState( { ...state, ...{ token: '', isAuthenticated: false, } } );
            localStorage.removeItem( STORAGE_NAME );
        } );
};
/**
 * Auth check handler.
 */
const check = (  ) => {
    if ( !state.isAuthenticated ) {
        const token = localStorage.getItem( STORAGE_NAME );
        if ( token ) {
            setState( { ...state, ...{ token, isAuthenticated: true, } } );
        }
    }
};
const init: States = { isAuthenticated: false, token: '', me: User.plane(  ), login, logout, check, };
export const AuthContext = React.createContext<States>( init );
/**
 * Provide authentication middleware.
 * @param param0 Child react node
 * @returns AuthProvider
 */
export const AuthProvider: React.FC<Props> = ( { children } ) => {
    [ state, setState ] = React.useState<States>( init );
    React.useEffect( check );
    return <AuthContext.Provider value={ state } { ...{ children, } } />;
};
/**
 * Manage authentication middleware.
 * @param param0 Child react node
 * @returns AuthManager
 */
export const AuthManager = AuthContext.Consumer;
/**
 * Show content only to authenticated users.
 * @param param0 args
 * @returns WithAuthentication
 */
export const WithAuthentication: React.FC<{ children: ( args: Pick<States, 'logout'> ) => React.ReactNode }> = ( { children } ) => {
    return <AuthManager children={ ( { isAuthenticated, logout } ) => {
        if ( isAuthenticated ) return children( { logout } );
        return null;
    } } />;
};
/**
 * Show content only to authorized users
 * @param param0 args
 * @returns WithPermission
 */
export const WithPermission: React.FC<{ perms: Permissions[], children: ( args: Pick<States, 'me'> ) => React.ReactNode }> = ( { perms, children } ) => {
    return <AuthManager children={ ( { me } ) => {
        if ( me.hasPerm( perms ) ) return children( { me } );
        return null;
    } } />;
};
/**
 * Show nodes that do not require authentication.
 * @param param0 args
 * @returns WithoutAuthentication
 */
export const WithoutAuthentication: React.FC<{ children: ( args: Pick<States, 'login' | 'check' | 'isAuthenticated'> ) => React.ReactNode }> = ( { children } ) => {
    return <AuthManager children={ ( { login, check, isAuthenticated } ) => children( { login, check, isAuthenticated } ) } />;
};
