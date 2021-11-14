export class Models<M extends {
    [ x: string ]: any;
}> {

    public parameters<T extends M>( metaNames: ( keyof T )[] ) {
        let _parameters: {
            [ K in keyof T ]?: T[ K ];
        } = {  };
        metaNames.forEach( metaName => ( _parameters[ metaName ] = Reflect.get( this, metaName ) as T[ typeof metaName ] ) );
        return _parameters;
    }

};
