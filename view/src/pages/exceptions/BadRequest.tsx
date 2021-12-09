import React from 'react';
import { Guest } from '@/components/layouts/Guest';
export const BadRequest: React.VFC = (  ) => {
    return (
        <Guest>
            <p className='text-lg tracking-wide'>400 Bad Request.</p>
        </Guest>
    );
};
