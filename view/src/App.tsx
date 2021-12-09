import React from 'react'
import { MiddlewareProvider } from './services';
import { ReactRouter, ReactRouterView } from './ReactRouter';
export const App: React.FC<{}> = ( {  } ) => {
    return (
        <ReactRouter>
            <MiddlewareProvider>
                <ReactRouterView />
            </MiddlewareProvider>
        </ReactRouter>
    );
};
