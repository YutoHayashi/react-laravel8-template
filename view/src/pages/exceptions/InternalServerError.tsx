import React from 'react';
import { Guest } from '@/components/layouts/Guest';
export const InternalServerError: React.VFC = (  ) => {
    return (
        <Guest>
            <p className='text-lg tracking-wide'>500 Internal Server Error.</p>
        </Guest>
    );
};
