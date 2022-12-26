@extends('layouts.login')

@section('content')
<h2>Follow List</h2>

@foreach($users as $user)
<img src="/images/{{ $user->images }}">
@endforeach
<br>
@foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td><a href="other-profile/{{ $user->id }}"><img src="/images/{{ $user->images }}"></a></td>
        <td>{{ $user->posts }}</td>
        <td>{{ $user->created_at }}</td>
    </tr>
    <br>
@endforeach

@endsection