@extends('layouts.login')

@section('content')
{!! Form::open(['url' => 'result']) !!}
            {!! Form::input('text', 'word', null, ['class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            <button type="submit" class="btn btn-success pull-right">検索</button>
            {!! Form::close() !!}

            <table class='table table-hover'>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td><img src="/images/{{ $user->images }}"></td>
        <td><a href="add-follow/{{$user->id}}">フォローする</a></td>
        <td><a href="rem-follow/{{$user->id}}">フォロー外す</a></td>
    </tr>
    @endforeach
</table>
@endsection
