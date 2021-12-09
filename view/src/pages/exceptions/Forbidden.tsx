import React from 'react';
import { Guest } from '@/components/layouts/Guest';
export const Forbidden: React.VFC = (  ) => {
    return (
        <Guest>
            <p className='text-lg tracking-wide'>403 Forbidden.</p>
        </Guest>
    );
};
