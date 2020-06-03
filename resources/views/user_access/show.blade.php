@extends('layouts.layout')
@section('content')
    <div class="justified-flex position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                User Access Details
            </div>
            <p class="id"><b>Id:</b> {{ $user_access->id }}</p>
            <p class="user-id"><b>User Id:</b> {{ $user_access->user_id }}</p>
            <p class="last-login"><b>Login date:</b> {{ $user_access->last_login }}</p>

            <div class="links">
                <a href="/users"><- Back to all user</a>
            </div>
        </div>
    </div>
@endsection
