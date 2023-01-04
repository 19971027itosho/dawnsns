@extends('layouts.login')

@section('content')
    <img src="/images/{{ $user->images }}">
        {!! Form::open(['url' => 'up-profile','files'=>true]) !!}

            <p>UserName</p>
            {!! Form::input('text', 'username', $auth->username) !!}

            <p>MailAdress</p>
            {!! Form::input('text', 'mail', $auth->mail) !!}

            <p>Password</p>
            <p>●●●●●●</p>

            <p>new Password</p>
            {!! Form::input('text', 'new_pw', null) !!}

            <p>Bio</p>
            {!! Form::input('text', 'bio', $auth->bio) !!}

            <p>Icon Image</p>
            {!! Form::file('image') !!}

            <br><br><br>
            {{Form::submit('送信', ['class'=>'btn btn-primary btn-block'])}}

        {!! Form::close() !!}
@endsection