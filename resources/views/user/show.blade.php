@extends('layouts.layout')
@section('content')
<div class="justified-flex position-ref full-height">

    <div class="content">
        <h1>
            User Details
        </h1>
        <p class="id"><b>Id:</b> {{ $user->id }}</p>
        <p class="name"><b>Name:</b> {{ $user->name }}</p>
        <p class="email"><b>Email:</b> {{ $user->email }}</p>
        <p class="active"><b>Active:</b> {{ $user->active ? 'Active' : 'Inactive' }}</p>
        @if(count($user->user_accesses))
            <hr>
            <h1>User accesses</h1>
            @foreach($user->user_accesses as $user_access)
                <p class="user-access-last-login">{{ $user_access->last_login }}</p>
            @endforeach
        @endif

        <div class="links">
            <a href="/users"><- Back to all user</a>
        </div>
    </div>
</div>
@endsection
