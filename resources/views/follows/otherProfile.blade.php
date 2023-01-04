@extends('layouts.login')

@section('content')

                {{ $user->username }}
                {{ $user->bio }}
                <img src="/images/{{ $user->images }}">
<br>
<br>
                @foreach ($posts as $post)
                <img src="/images/{{ $post->images }}">
                <!-- contains含まれていたら$user->id -->
                @if($followed->contains('follow',$post->id))
                    <div class="follow-btn orange">
                        <a href="{{url('rem-follow/$post->id')}}">フォロー外す</a>
                    </div>
                @else
                    <div class="follow-btn blue">
                        <a href="add-follow/{{$post->id}}">フォローする</a>
                    </div>
                @endif
                <br>
            @endforeach
@endsection