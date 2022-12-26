@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
<p>{{ $errors->first('username') }}</p>

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<p>{{ $errors->first('mail') }}</p>

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
<p>{{ $errors->first('password') }}</p>

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
<p>{{ $errors->first('password') }}</p>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

<!-- 練習 -->
@endsection
