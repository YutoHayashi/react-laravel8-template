import React from 'react';
import { WithoutAuthentication } from '@/middleware/Auth';
import { Link } from 'react-router-dom';
import { Mdi } from '@/components/atoms/Mdi';
import { Btn, Handler } from '@/components/molecules/Btn';
type States = {
    gnav: boolean;
};
let state: States;
let setState: React.Dispatch<React.SetStateAction<States>>;
const gnavbtnOnclick = ( e: React.MouseEvent<HTMLButtonElement> ) => {
    setState( { ...state, ...{ gnav: !state.gnav } } );
};
export const Admin: React.FC<{}> = ( { children } ) => {
    [ state, setState ] = React.useState<States>( { gnav: false, } );
    const { gnav } = state;
    return (
        <main className={ `h-screen w-full text-gray-600 block ${ gnav ? 'xl:grid' : '' } grid-cols-2 px-5 sm:px-10 md:px-20` } style={ { backgroundColor: '#F6F6F6', } }>
            <Btn onClick={ gnavbtnOnclick } className='absolute left-0 top-0 py-5 px-5 cursor-pointer text-xl'>
                <Mdi icon='menu' />
            </Btn>
            <div className={ `h-full hidden ${ gnav ? 'xl:flex' : '' } items-center justify-center flex-col px-10 shadow h-screen` }>
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
            <div className='h-full flex items-center justify-center flex-wrap mx-2 md:px-10 py-5 box-border'>
                { children }
            </div>
        </main>
    );
};
