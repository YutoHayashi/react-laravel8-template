import React from 'react';
type Props = {};
export const DocumentSection: React.FC<Props> = ( { children } ) => {
    return (
        <section className={ `my-10 border-l-2 border-gray-400 py-5 px-3 w-full` }>
            { children }
        </section>
    );
};
