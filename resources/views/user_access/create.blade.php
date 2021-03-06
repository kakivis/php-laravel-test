@extends('layouts.layout')
@section('content')
    <div class="justified-flex position-ref full-height">
        <div class="create-user-access-form">
            <h1>Create User Access</h1>
            <form action="/user_accesses" method="POST">
                @csrf
                <label for="user-id">User id:</label>
                <input type="text" id="user-id" name="user_id">
                <label for="login-date">Last login:</label>
                <input type="datetime-local" id="last-login" name="last_login">
                <input type="submit" value="Create">
            </form>
        </div>


        <div class="links">
            <a href="/user_accesses"><- Back to User Access Report</a>
        </div>
    </div>
@endsection
