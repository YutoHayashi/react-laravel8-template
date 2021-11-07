import React, { ReactNode } from 'react';
type Props = {};
/**
 * Middleware Provision Entry Point
 * @param props child react node
 * @returns ReactNode
 */
export const MiddlewareProvider = ( props: { children: ReactNode } ) => {
    return [
        props.children,
    ].reduce( ( P: ReactNode, C: ReactNode ) => ( <C children={ P } /> ), );
};
