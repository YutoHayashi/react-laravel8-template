import React from 'react';
export const Admin: React.FC<{}> = ( { children } ) => {
    return (
        <main className='h-screen w-full text-gray-600' style={ { backgroundColor: '#F6F6F6', } }>
            { children }
        </main>
    );
};
