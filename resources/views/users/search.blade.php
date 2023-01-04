@extends('layouts.login')

@section('content')
    {!! Form::open(['url' => 'result']) !!}
            {!! Form::input('text', 'word', null, ['class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            <button type="submit" class="btn btn-success pull-right">検索</button>
        {!! Form::close() !!}

        <div class='table table-hover'>
            @foreach ($users as $user)
                {{ $user->id }}
                {{ $user->username }}
                <img src="/images/{{ $user->images }}">
                <!-- contains含まれていたら$user->id -->
                @if($followed->contains('follow',$user->id))
                    <div class="follow-btn orange">
                        <a href="rem-follow/{{$user->id}}">フォロー外す</a>
                    </div>
                @else
                    <div class="follow-btn blue">
                        <a href="add-follow/{{$user->id}}">フォローする</a>
                    </div>
                @endif
                <br>
            @endforeach
</div>
@endsection
