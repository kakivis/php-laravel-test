@extends('layouts.layout')
@section('content')
    <div class="create-user-access-form">
        <h1>Create User Access</h1>
        <form action="" method="">
            <label for="user-id">User id:</label>
            <input type="text" id="user-id" name="user-id">
            <label for="login-date">Login date:</label>
            <input type="datetime-local" id="login-date" name="login-date">
            <input type="submit" value="Create">
        </form>
    </div>


    <div class="links">
        <a href="/user_accesses"><- Back to User Access Report</a>
    </div>
@endsection
