import React from 'react';
import { Admin } from '@/components/layouts/Admin';
import { Btn } from '@/components/molecules/Btn';
import { AuthManager } from '@/middleware/Auth';
import { Redirect } from 'react-router';
export const Layout: React.FC<{}> = ( { children } ) => {
    return (
        <Admin>
            <AuthManager>
                { ( { isAuthenticated } ) => {
                    if ( !isAuthenticated ) return <Redirect to={ `/admin/login` } />
                    return (
                        <div className='flex w-full h-full'>
                            <nav className='border-r border-gray-300 pr-5'>
                                <ul>
                                    <li>
                                        <Btn to={ `/admin/documents` } className={ `text-base my-2 font-bold border border-transparent hover:border-gray-400 hover:text-green-700 whitespace-nowrap` }>React-Laravel8-Template</Btn>
                                    </li>
                                    <li>
                                        <Btn to={ `/admin/documents/getstarted` } className={ `text-base my-2 font-bold border border-transparent hover:border-gray-400 hover:text-green-700 whitespace-nowrap` }>初めに</Btn>
                                    </li>
                                    <li>
                                        <Btn to={ `/admin/documents/app` } className={ `text-base my-2 font-bold border border-transparent hover:border-gray-400 hover:text-green-700 whitespace-nowrap` }>REST Laravel8</Btn>
                                    </li>
                                    <li>
                                        <Btn to={ `/admin/documents/docker` } className={ `text-base my-2 font-bold border border-transparent hover:border-gray-400 hover:text-green-700 whitespace-nowrap` }>Dockerイメージ</Btn>
                                    </li>
                                    <li>
                                        <Btn to={ `/admin/documents/view` } className={ `text-base my-2 font-bold border border-transparent hover:border-gray-400 hover:text-green-700 whitespace-nowrap` }>React + typeScript</Btn>
                                    </li>
                                </ul>
                            </nav>
                            <div className='px-4 py-5 w-full h-full box-border overflow-y-auto'>
                                { children }
                            </div>
                        </div>
                    );
                } }
            </AuthManager>
        </Admin>
    );
};
