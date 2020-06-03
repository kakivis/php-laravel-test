@extends('layouts.layout')
@section('content')
<div class="justified-flex position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            User Access Report
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Last Login</th>
                <th>Actions</th>
            </tr>
            @foreach($user_accesses as $user_access)
                <tr>
                    <td>{{$user_access->id }}</td>
                    <td>{{$user_access->user_id}}</td>
                    <td>{{$user_access->last_login}}</td>
                    <td><a href="/user_accesses/{{ $user_access->id }}"> Show </a></td>
                </tr>
            @endforeach
        </table>

        <div class="links">
            <a href="/"><- Back to index</a>
            <a href="/user_accesses/create">Create new user access</a>
        </div>
    </div>
</div>
@endsection
