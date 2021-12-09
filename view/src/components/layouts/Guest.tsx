import React from 'react';
export const Guest: React.FC<{}> = ( { children } ) => {
    return (
        <main className={ `h-screen w-full text-gray-600 block flex items-center justify-center` } style={ { backgroundColor: '#F6F6F6', } }>
            { children }
        </main>
    );
};
