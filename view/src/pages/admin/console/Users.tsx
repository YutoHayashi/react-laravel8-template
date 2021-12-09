import React from 'react';
import { Admin } from '@/components/layouts/Admin';
import { ExceptionManager } from '@/services/Exceptions';
export const Users: React.VFC<{}> = ( {  } ) => {
    return (
        <Admin>
            <ExceptionManager>
                { ( { throwException } ) => {
                    throwException( 503 );
                    return <></>
                } }
            </ExceptionManager>
        </Admin>
    );
}
