import React from 'react';
import { useLocation } from 'react-router';
import * as Exceptions from '@/pages/exceptions';
type States = {
    code: number | null;
    throwException: typeof throwException;
};
let state: States;
let setState: React.Dispatch<React.SetStateAction<States>>;
const throwException = ( code: number ) => {
    setState( { ...state, ...{ code, } } );
};
const init: States = {
    code: null,
    throwException,
};
export const ExceptionContext = React.createContext<States>( init );
export const ExcepitonPage: React.FC<{ code: number | null }> = ( { code, children } ) => {
    if ( ! code ) return <>{ children }</>;
    switch( code ) {
        case 400:
            return <Exceptions.BadRequest />;
        case 401:
            return <Exceptions.Unauthorized />;
        case 403:
            return <Exceptions.Forbidden />;
        case 404:
            return <Exceptions.NotFound />;
        case 500:
            return <Exceptions.InternalServerError />;
        case 503:
            return <Exceptions.ServiceUnavailable />;
        default:
            return <Exceptions.InternalServerError />;
    }
};
/**
 * Provide exception service
 * @param param0 Child react node
 * @returns Exception service provider
 */
export const ExceptionProvider: React.FC<{}> = ( { children } ) => {
    [ state, setState ] = React.useState<States>( init );
    const location = useLocation(  );
    React.useEffect( (  ) => {
        setState( { ...state, ...{ code: null } } );
    }, [ location ] );
    return <ExceptionContext.Provider value={ state } { ...{ children: <ExcepitonPage { ...{ code: state.code } }>{ children }</ExcepitonPage> } } />;
};
/**
 * Manager exception service
 * @param param0 Child react node
 * @returns ExceptionManager
 */
export const ExceptionManager: React.FC<{ children: ( states: States ) => React.ReactNode }> = ( { children } ) => <ExceptionContext.Consumer { ...{ children: states => children( states ) } } />;
