@extends('layouts.layout')
@section('content')
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            User Access Report
        </div>
        @foreach($user_accesses as $user_access)
            <p>{{ $user_access->id }} | {{$user_access->user_id}} | {{$user_access->last_login}}</p>
        @endforeach

        <div class="links">
            <a href="/"><- Back to index</a>
            <a href="/user_accesses/create">Create new user access</a>
        </div>
    </div>
</div>
@endsection
