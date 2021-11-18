import React from 'react';
import { Layout } from './Layout';
import { DocumentSection } from '@/components/molecules/admins/DocumentSection';
import { DocumentSectionHeading } from '@/components/molecules/admins/DocumentSectionHeading';
export const Top: React.VFC<{}> = ( {  } ) => {
    return (
        <Layout>
            <h2 className='font-bold text-xl'>React-Laravel8-Template</h2>
            <DocumentSection>
                <DocumentSectionHeading>開発</DocumentSectionHeading>
                <a href='https://github.com/YutoHayashi/react-laravel8-template' className='text-blue-500 hover:text-blue-400 underline'>https://github.com/YutoHayashi/react-laravel8-template</a>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>制作</DocumentSectionHeading>
                <a href='https://github.com/YutoHayashi' className='text-blue-500 hover:text-blue-400 underline'>Https://github.com/YutoHayashi</a>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>使用パッケージの公式ドキュメント</DocumentSectionHeading>
                <ul>
                    <li>
                        <b>Vite</b>:&ensp;
                        <a href='https://vitejs.dev/guide/' className='text-blue-500 hover:text-blue-400 underline'>https://vitejs.dev/guide/</a>
                    </li>
                    <li>
                        <b>TypeScript</b>:&ensp;
                        <a href='https://www.typescriptlang.org/docs/' className='text-blue-500 hover:text-blue-400 underline'>https://www.typescriptlang.org/docs/</a>
                    </li>
                    <li>
                        <b>Laravel8</b>:&ensp;
                        <a href='https://readouble.com/laravel/8.x/ja/' className='text-blue-500 hover:text-blue-400 underline'>https://readouble.com/laravel/8.x/ja/</a>
                    </li>
                    <li>
                        <b>Reactjs</b>:&ensp;
                        <a href='https://ja.reactjs.org/' className='text-blue-500 hover:text-blue-400 underline'>https://ja.reactjs.org/</a>
                    </li>
                    <li>
                        <b>React Router</b>:&ensp;
                        <a href='https://reactrouter.com/docs/en/v6' className='text-blue-500 hover:text-blue-400 underline'>https://reactrouter.com/docs/en/v6</a>
                    </li>
                    <li>
                        <b>Axios</b>:&ensp;
                        <a href='https://axios-http.com/docs/intro' className='text-blue-500 hover:text-blue-400 underline'>https://axios-http.com/docs/intro</a>
                    </li>
                    <li>
                        <b>Tailwindcss</b>:&ensp;
                        <a href='https://tailwindcss.com/docs' className='text-blue-500 hover:text-blue-400 underline'>https://tailwindcss.com/docs</a>
                    </li>
                    <li>
                        <b>Tailwindcss Forms</b>:&ensp;
                        <a href='https://v1.tailwindcss.com/components/forms' className='text-blue-500 hover:text-blue-400 underline'>https://v1.tailwindcss.com/components/forms</a>
                    </li>
                    <li>
                        <b>Material Design Icon</b>:&ensp;
                        <a href='https://pictogrammers.github.io/@mdi/font/2.0.46/' className='text-blue-500 hover:text-blue-400 underline'>https://pictogrammers.github.io/@mdi/font/2.0.46/</a>
                    </li>
                </ul>
            </DocumentSection>
        </Layout>
    );
};
