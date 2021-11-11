import { WithoutAuthentication } from '@/middleware/Auth';
import React from 'react';
import { Link } from 'react-router-dom';
export const Admin: React.FC<{}> = ( { children } ) => {
    return (
        <main className='h-screen w-full text-gray-600 block md:grid grid-cols-2 px-5 md:px-20' style={ { backgroundColor: '#F6F6F6', } }>
            <div className='h-full hidden md:flex items-center justify-center flex-col px-10'>
                <div className='mb-10'>
                    <h1 className='font-bold text-3xl text-gray-600 text-center w-full tracking-wide'>React-Laravel8-Template</h1>
                    <a href='https://github.com/YutoHayashi/react-laravel8-template' target='_blank' className='mt-4 text-blue-500 hover:text-blue-400 underline'>https://github.com/YutoHayashi/react-laravel8-template</a>
                </div>
                <nav className='mb-10'>
                    <ul className='flex items-center justify-center flex-wrap'>
                        <WithoutAuthentication>
                            { ( { isAuthenticated } ) => ( [
                                { to: '/admin/documents', title: 'Documents', },
                                { to: '/admin/console', title: 'Admin Console', },
                                ...[ isAuthenticated ? { to: '/admin/logout', title: 'Admin Logout', } : { to: '/admin/login', title: 'Admin Login', }, ],
                            ] ).map( ( item, i ) => (
                                <li key={ i } className='m-2'>
                                    <Link to={ item.to } className='py-1 px-5 rounded border border-gray-600 flex items-center justify-center hover:bg-gray-600 hover:text-white'>{ item.title }</Link>
                                </li>
                            ) ) }
                        </WithoutAuthentication>
                    </ul>
                </nav>
            </div>
            <div className='h-full flex items-center justify-center flex-wrap'>
                { children }
            </div>
        </main>
    );
};
