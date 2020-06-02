@extends('layouts.layout')
@section('content')
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            User Report
        </div>
        @foreach($users as $user)
            <p>{{ $user->id }} | {{$user->name}} | {{$user->email}} | {{$user->active}}</p>
        @endforeach

        <div class="links">
            <a href="/"><- Back to index</a>
            <a href="/users/create">Create new user</a>
        </div>
    </div>
</div>
@endsection
