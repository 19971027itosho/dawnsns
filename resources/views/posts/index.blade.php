@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

{!! Form::open(['url' => 'post/create']) !!}
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
            <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="post"></button>
            {!! Form::close() !!}

<table class='table table-hover'>
    <tr>
        <th>投稿No</th>
        <th>投稿内容</th>
        <th>投稿日時</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->posts }}</td>
        <td>{{ $post->created_at }}</td>
        <td>
        {!! Form::open(['url' => 'post/update']) !!}{!! Form::input('text', 'upPost', $post->posts , ['required', 'class' => 'form-control']) !!}
        {{Form::hidden('id', $post->id)}}
            <button type="submit" class="btn btn-success pull-right"><img src="images/edit.png" alt="post"></button>
            {!! Form::close() !!}
</td>
        <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')">
                <img src="images/trash.png" alt="trash">
            </a>
        </td>
    </tr>
    @endforeach
</table>

@endsection