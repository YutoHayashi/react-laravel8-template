import React from 'react';
import { Redirect } from 'react-router';
import { Admin } from '@/components/layouts/Admin';
import { AuthManager } from '@/middleware/Auth';
export const Top: React.VFC<{}> = ( {  } ) => {
    return (
        <Admin>
            <AuthManager>
                { ( { isAuthenticated } ) => {
                    if ( !isAuthenticated ) return <Redirect to={ `/admin/login` } />;
                    return <Redirect to={ `/admin/console/users` } />;
                } }
            </AuthManager>
        </Admin>
    );
};
