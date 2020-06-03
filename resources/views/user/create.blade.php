@extends('layouts.layout')
@section('content')
    <div class="justified-flex position-ref full-height">
        <div class="create-user-form">
            <h1>Create User</h1>
            <form action="/users" method="POST">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <input type="checkbox" id="active" name="active" value="1">
                <label for="active"> Active user</label>
                <input type="submit" value="Create">
            </form>
        </div>
        <div class="links">
            <a href="/users"><- Back to User Report</a>
        </div>
    </div>
@endsection
