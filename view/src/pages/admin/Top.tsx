import React from 'react';
import { Redirect } from 'react-router-dom';
export const Top: React.VFC<{}> = ( {  } ) => {
    if ( import.meta.env.MODE === 'development' ) {
        return <Redirect to={ `/admin/documents` } />;
    } else {
        return <Redirect to={ `/admin/login` } />;
    }
};
