import React from 'react';
import { AuthProvider } from './Auth';
import { ExceptionProvider } from './Exceptions';
/**
 * Middleware Provision Entry Point
 * @param props child react node
 * @returns ReactNode
 */
export class MiddlewareProvider extends React.Component<{}, {}> {
    public render(  ) {
        return ( [
            this.props.children,
            AuthProvider,
            ExceptionProvider,
        ] as React.ReactNode[] ).reduce( ( P, C ) => ( <C children={ P } /> ), );
    }
}
