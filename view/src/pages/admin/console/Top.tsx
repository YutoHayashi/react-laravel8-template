import React from 'react';
import { Redirect } from 'react-router';
import { Admin } from '@/components/layouts/Admin';
import { WithoutAuthentication } from '@/middleware/Auth';
export const Top: React.VFC<{}> = ( {  } ) => {
    return (
        <Admin>
            <WithoutAuthentication>
                { ( { isAuthenticated } ) => {
                    if ( !isAuthenticated ) return <Redirect to={ `/admin/login` } />
                    return (
                        <>console</>
                    )
                } }
            </WithoutAuthentication>
        </Admin>
    );
};
