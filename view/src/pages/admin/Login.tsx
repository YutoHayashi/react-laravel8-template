import React from 'react';
import { Admin } from '@/components/layouts/Admin';
import { Btn, Handler as BtnHandler } from '@/components/molecules/Btn';
import { WithoutAuthentication } from '@/middleware/Auth';
import { Redirect } from 'react-router';
const btn: React.Ref<BtnHandler> = React.createRef(  );
const email: React.Ref<HTMLInputElement> = React.createRef(  );
const password: React.Ref<HTMLInputElement> = React.createRef(  );
const getData = (  ) => ( {
    email: email.current?.value || '',
    password: password.current?.value || '',
} );
export const Login: React.VFC<{}> = ( {  } ) => {
    return (
        <Admin>
            <WithoutAuthentication>
                { ( { login, isAuthenticated } ) => {
                    if ( isAuthenticated ) return <Redirect to={ `/admin/console` } />
                    return (
                        <div className='w-full'>
                            <h2 className='text-xl font-bold text-left w-full mb-10'>Admin Login</h2>
                            <label className='mb-5 block'>
                                <p className='mb-2 font-bold'>Email: </p>
                                <input ref={ email } type='text' className='border-transparent hover:border-gray-300 rounded cursor-pointer outline-none w-full'></input>
                            </label>
                            <label className='mb-5 block'>
                                <p className='mb-2 font-bold'>Password: </p>
                                <input ref={ password } type='password' className='border-transparent hover:border-gray-300 rounded cursor-pointer outline-none w-full'></input>
                            </label>
                            <Btn ref={ btn } color='blue' onClick={ e => {
                                btn.current?.startLoading(  );
                                login( getData(  ) )
                                    .then( (  ) => btn.current?.endLoading(  ) )
                                    .catch( e => btn.current?.endLoading(  ) );
                            } }>Login</Btn>
                        </div>
                    );
                } }
            </WithoutAuthentication>
        </Admin>
    );
};
