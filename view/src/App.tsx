import React from 'react'
import { MiddlewareProvider } from './middleware';
import { ReactRouter, ReactRouterView } from './ReactRouter';
export const App: React.FC<{}> = ( {  } ) => {
    return (
        <MiddlewareProvider>
            <ReactRouter>
                <ReactRouterView />
            </ReactRouter>
        </MiddlewareProvider>
    );
};
