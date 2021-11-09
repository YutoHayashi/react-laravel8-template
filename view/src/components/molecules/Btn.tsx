import React from 'react';
import { Link } from 'react-router-dom';
import { Mdi } from '@/components/atoms/Mdi';
export type Handler = {
    startLoading: (  ) => void;
    endLoading: (  ) => void;
};
type Props = JSX.IntrinsicElements[ 'button' ] & {
    color: string;
    onClick?: React.MouseEventHandler<HTMLButtonElement>;
    className?: string;
    to?: string;
};
type States = {
    loading: boolean;
};
let state: States;
let setState: React.Dispatch<React.SetStateAction<States>>;
export const Btn = React.forwardRef<Handler, Props>( ( props, ref ) => {
    [ state, setState ] = React.useState<States>( {
        loading: false,
    } );
    const { children, to, color, onClick, className } = props;
    const { loading } = state;
    const startLoading = (  ) => setState( { loading: true, } );
    const endLoading = (  ) => setState( { loading: false, } );
    React.useImperativeHandle( ref, (  ) => ( { startLoading, endLoading } ) );
    if ( to ) {
        return <Link to={ to } className={ `bg-${ color }-500 hover:bg-${ color }-400 block py-1 px-5 rounded text-white font-base text-xs ${ className }` }>{ children }</Link>;
    } else {
        return (
            <button className={ `bg-${ color }-500 hover:bg-${ color }-400 block py-1 px-5 rounded text-white font-base ${ className }` } onClick={ onClick }>
                { loading ? (
                    <Mdi icon='loading' className='mdi-spin' />
                ) : children }
            </button>
        );
    }
} );
