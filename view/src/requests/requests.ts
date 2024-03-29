import axios from 'axios';
/**
 * Axios instance.
 */
export const instance = axios.create( {
    baseURL: `${ import.meta.env.VITE_SERVER_NAME }/api`,
    responseType: 'json',
    withCredentials: true,
} );
instance.interceptors.response.use(
    res => Promise.resolve( res ),
    function( error ) {
        return Promise.reject( error.response );
    }
);
instance.defaults.headers.common[ 'X-Requested-With' ] = 'XMLHttpRequest';
export const Credentials = ( args: { token: string } ) => ( {
    'Authorization': args.token,
    'Content-Type': 'application/json' as const,
} );
