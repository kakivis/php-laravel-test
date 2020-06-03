@extends('layouts.layout')
@section('content')
    <div class="justified-flex position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Composite Report
            </div>
            <div>
                <form class="search-bar" action="/composite_report" method="POST">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email">
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <br>
                    <label for="start-date">Start date:</label>
                    <input type="datetime-local" id="start-date" name="start_date">
                    <label for="end-date">End date:</label>
                    <input type="datetime-local" id="end-date" name="end_date">
                    <input type="submit" value="Search">
                    <br>
                    <input class="align-left" type="button" value="Top 10 least logged in" onclick="window.location.href='/composite_report/least_logged'" />
                    <input class="align-right" type="button" value="Top 10 most logged in" onclick="window.location.href='/composite_report/most_logged'" />
                </form>
            </div>
            <div class="table-container">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number of logins</th>
                        <th>Active</th>

                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{count($user->user_accesses)}}</td>
                            <td>{{$user->active ? 'Active' : 'Inactive'}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="links">
                <a href="/"><- Back to index</a>
            </div>
        </div>
    </div>
@endsection
