import axios from 'axios';
/**
 * Axios instance.
 */
export const instance = axios.create( {
    baseURL: `${ import.meta.env.VITE_SERVER_NAME }`,
    responseType: 'json',
} );
instance.interceptors.response.use(
    res => Promise.resolve( res ),
    function( error ) {
        return Promise.reject( error.response );
    }
);
