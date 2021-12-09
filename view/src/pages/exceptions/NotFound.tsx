import React from 'react';
import { Guest } from '@/components/layouts/Guest';
export const NotFound: React.VFC = (  ) => {
    return (
        <Guest>
            <p className='text-lg tracking-wide'>404 Not Found.</p>
        </Guest>
    );
};
