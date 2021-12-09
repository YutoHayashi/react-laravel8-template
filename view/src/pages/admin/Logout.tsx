import React from 'react';
import { Redirect } from 'react-router';
import { AuthManager } from '@/services/Auth';
export const Logout: React.VFC<{}> = ( {  } ) => {
    return (
        <AuthManager>
            { ( { isAuthenticated, logout } ) => {
                if ( isAuthenticated ) {
                    logout(  );
                    return <Redirect to={ `/admin/login` } />;
                }
                return <Redirect to={ `/admiin/login` } />;
            } }
        </AuthManager>
    );
};
