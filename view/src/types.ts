export type Routes = Array<{
    path: string;
    component: React.FunctionComponent<any>;
    exact?: boolean;
    children?: Routes;
}>;
