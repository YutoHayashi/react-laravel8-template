import React from 'react';
import { Redirect } from 'react-router';
import { WithAuthentication, WithoutAuthentication } from '@/middleware/Auth';
export const Logout: React.VFC<{}> = ( {  } ) => {
    return (
        <WithoutAuthentication>
            { ( { isAuthenticated } ) => {
                if ( isAuthenticated ) {
                    return (
                        <WithAuthentication>
                            { ( { logout } ) => {
                                logout(  );
                                return <Redirect to={ `/admin/login` } />
                            } }
                        </WithAuthentication>
                    );
                } else return <Redirect to={ `/admin/login` } />;
            } }
        </WithoutAuthentication>
    );
};
