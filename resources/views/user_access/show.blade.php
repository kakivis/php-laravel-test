@extends('layouts.layout')
@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                User Access Details
            </div>
            <p class="id">{{ $user_access->id }}</p>
            <p class="user-id">{{ $user_access->user_id }}</p>
            <p class="last-login">{{ $user_access->last_login }}</p>

            <div class="links">
                <a href="/users"><- Back to all user</a>
            </div>
        </div>
    </div>
@endsection
