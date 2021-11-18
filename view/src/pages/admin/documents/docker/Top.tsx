import React from 'react';
import { DocumentSection } from '@/components/molecules/admins/DocumentSection';
import { Layout } from '../Layout';
import { DocumentSectionHeading } from '@/components/molecules/admins/DocumentSectionHeading';
export const Top: React.FC<{}> = ( {  } ) => {
    return (
        <Layout>
            <h2 className='font-bold text-xl'>Dockerイメージ</h2>
            <DocumentSection>
                <DocumentSectionHeading>db</DocumentSectionHeading>
                <table className='table-auto'>
                    <tbody>
                        <tr>
                            <th className='text-left align-top py-2'><b>NetworkMode</b>:</th>
                            <td className='py-2'>react-laravel8-template_main</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>PortBindings</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd className='flex'>
                                        <b>3306/tcp</b>:&ensp;
                                        <dl className='w-full'>
                                            <dd><b>HostIp</b>:&nbsp;"0.0.0.0"</dd>
                                            <dd><b>HostPort</b>:&nbsp;null</dd>
                                        </dl>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Env</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>MYSQL_MAJOR</b>=5.7</dd>
                                    <dd><b>MYSQL_VERSION</b>=5.7.33-1debian10</dd>
                                    <dd><b>MYSQL_ROOT_HOST</b>=172.10.0.10</dd>
                                    <dd><b>MYSQL_ROOT_PASSWORD</b>=root</dd>
                                    <dd><b>MYSQL_DATABASE</b>=application</dd>
                                    <dd><b>MYSQL_USER</b>=admin</dd>
                                    <dd><b>MYSQL_PASSWORD</b>=admin</dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Cmd</b>:</th>
                            <td className='py-2'>"mysqld --character-ser-server=utf8mb4 --collation-server=utf8mb4_unicode_ci"</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Workdir</b>:</th>
                            <td className='py-2'>/var/lib/mysql</td>
                        </tr>
                    </tbody>
                </table>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>phpmyadmin</DocumentSectionHeading>
                <table className='table-auto'>
                    <tbody>
                        <tr>
                            <th className='text-left align-top py-2'><b>NetworkMode</b>:</th>
                            <td className='py-2'>react-laravel8-template_main</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>PortBindings</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd className='flex'>
                                        <b>80/tcp</b>:&ensp;
                                        <dl className='w-full'>
                                            <dd><b>HostIp</b>:&nbsp;""</dd>
                                            <dd><b>HostPort</b>:&nbsp;8081</dd>
                                        </dl>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Env</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>PMA_ARBITRARY</b>=1</dd>
                                    <dd><b>PMA_HOST</b>=db</dd>
                                    <dd><b>PMA_PORT</b>:=3306</dd>
                                    <dd><b>PMA_USER</b>=admin</dd>
                                    <dd><b>PMA_PASSWORD</b>=admin</dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Cmd</b>:</th>
                            <td className='py-2'>"apache2-foreground"</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Workdir</b>:</th>
                            <td className='py-2'>/var/www/html</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Networks</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>Ipv4Address</b>:&nbsp;172.10.0.11</dd>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>php</DocumentSectionHeading>
                <table className='table-auto'>
                    <tbody>
                        <tr>
                            <th className='text-left align-top py-2'><b>NetworkMode</b>:</th>
                            <td className='py-2'>react-laravel8-template_main</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>PortBindings</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd className='flex'>
                                        <b>9000/tcp</b>:&ensp;
                                        <dl className='w-full'>
                                            <dd><b>HostIp</b>:&nbsp;"0.0.0.0"</dd>
                                            <dd><b>HostPort</b>:&nbsp;null</dd>
                                        </dl>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Env</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>PHP_INI_DIR</b>=/usr/local/etc/php</dd>
                                    <dd><b>PHP_VERSION</b>=7.4.25</dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Cmd</b>:</th>
                            <td className='py-2'>"php-fpm"</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Workdir</b>:</th>
                            <td className='py-2'>/var/www/html/app</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Networks</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>Ipv4Address</b>:&nbsp;172.10.0.12</dd>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>server</DocumentSectionHeading>
                <table className='table-auto'>
                    <tbody>
                        <tr>
                            <th className='text-left align-top py-2'><b>NetworkMode</b>:</th>
                            <td className='py-2'>react-laravel8-template_main</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>PortBindings</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd className='flex'>
                                        <b>80/tcp</b>:&ensp;
                                        <dl className='w-full'>
                                            <dd><b>HostIp</b>:&nbsp;""</dd>
                                            <dd><b>HostPort</b>:&nbsp;8080</dd>
                                        </dl>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Cmd</b>:</th>
                            <td className='py-2'>"/usr/sbin/httpd" , "-DFOREGROUND"</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Workdir</b>:</th>
                            <td className='py-2'>/var/www/html</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Networks</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>Ipv4Address</b>:&nbsp;172.10.0.13</dd>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>node</DocumentSectionHeading>
                <table className='table-auto'>
                    <tbody>
                        <tr>
                            <th className='text-left align-top py-2'><b>NetworkMode</b>:</th>
                            <td className='py-2'>react-laravel8-template_main</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>PortBindings</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd className='flex'>
                                        <b>8000/tcp</b>:&ensp;
                                        <dl className='w-full'>
                                            <dd><b>HostIp</b>:&nbsp;""</dd>
                                            <dd><b>HostPort</b>:&nbsp;8000</dd>
                                        </dl>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Env</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>NODE_VERSION</b>=14.16.1</dd>
                                    <dd><b>YARN_VERSION</b>=1.22.5</dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Tty</b>:</th>
                            <td>True</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Cmd</b>:</th>
                            <td className='py-2'>"node"</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Workdir</b>:</th>
                            <td className='py-2'>/app</td>
                        </tr>
                        <tr>
                            <th className='text-left align-top py-2'><b>Networks</b>:</th>
                            <td className='py-2'>
                                <dl className='w-full'>
                                    <dd><b>Ipv4Address</b>:&nbsp;172.10.0.14</dd>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>Dockerコンテナのビルド</DocumentSectionHeading>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose --build
                </code>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>Dockerコンテナの起動</DocumentSectionHeading>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose up
                </code>
                <p>-d オプションで、デタッチドモード（バックグラウンドで実行）</p>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose up -d
                </code>
                <p>--build オプションで、イメージをビルドしてから起動</p>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose up --build
                </code>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>Dockerコンテナの停止削除</DocumentSectionHeading>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose down
                </code>
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>Dockerコンテナからコマンドを実行する</DocumentSectionHeading>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose exec server bash
                </code>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose exec node sh
                </code>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose exec php php artisan up
                </code>
                等々
            </DocumentSection>
            <DocumentSection>
                <DocumentSectionHeading>Dockerコンテナの再起動</DocumentSectionHeading>
                <code className='px-5 py-2 inline-block bg-white rounded border my-2 w-full'>
                    $ docker-compose restart
                </code>
            </DocumentSection>
        </Layout>
    );
};
