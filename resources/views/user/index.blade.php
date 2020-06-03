@extends('layouts.layout')
@section('content')
<div class="justified-flex position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            User Report
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->active ? 'Active' : 'Inactive'}}</td>
                    <td><a href="/users/{{ $user->id }}"> Show </a></td>
                </tr>
            @endforeach
        </table>

        <div class="links">
            <a href="/"><- Back to index</a>
            <a href="/users/create">Create new user</a>
        </div>
    </div>
</div>
@endsection
