import * as Pages from '@/pages';
import { Routes } from '@/types';
export const routes: Routes = [

    { path: '/', component: Pages.Top, exact: true, }, // ← ここだけ children が定義できないよ！

    { path: '/admin', component: Pages.Admin.Top, exact: true, children: [

        { path: '/login', component: Pages.Admin.Login, exact: true, },
        { path: '/logout', component: Pages.Admin.Logout, exact: true, },

        { path: '/documents', component: Pages.Admin.Documents.Top, exact: true, children: [
            //
        ] },

        { path: '/console', component: Pages.Admin.Console.Top, exact: true, children: [
            { path: '/users', component: Pages.Admin.Console.Users, exact: true, },
        ] },

    ] },

    // 404
    { path: '*', component: Pages.NotFound, },

];
