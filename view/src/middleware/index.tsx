import React from 'react';
import { AuthProvider } from './Auth';
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
        ] as React.ReactNode[] ).reduce( ( P, C ) => ( <C children={ P } /> ), );
    }
}
