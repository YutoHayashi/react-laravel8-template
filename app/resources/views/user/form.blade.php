<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Register</title>
</head>
<body>
    {{ Form::open( [
        'action' => '\App\Http\Controllers\Web\UserController@save',
        'method' => 'POST',
    ] ) }}
        {{ Form::hidden( 'is_admin', true ) }}
        <ul>
        @foreach( $errors->all(  ) ?? @$errors ?? [  ] as $e )
            <li>{{ $e }}</li>
        @endforeach
        </ul>
        <label>
            名前: {{ Form::text( 'name' ) }}
        </label>
        <label>
            メールアドレス: {{ Form::email( 'email' ) }}
        </label>
        <label>
            パスワード: {{ Form::password( 'password' ) }}
        </label>
        {{ Form::submit(  ) }}
    {{ Form::close(  ) }}
</body>
</html>
