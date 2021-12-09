import React from 'react';
import { Guest } from '@/components/layouts/Guest';
export const Unauthorized: React.VFC = (  ) => {
    return (
        <Guest>
            <p className='text-lg tracking-wide'>401 Unauthorized.</p>
        </Guest>
    );
};
