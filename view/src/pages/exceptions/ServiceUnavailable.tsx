import React from 'react';
import { Guest } from '@/components/layouts/Guest';
export const ServiceUnavailable: React.VFC = (  ) => {
    return (
        <Guest>
            <p className='text-lg tracking-wide'>503 Service Unavailable.</p>
        </Guest>
    );
};
