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
                        <option value="">Any</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <br>
                    <label for="start-date">Start date:</label>
                    <input type="datetime-local" id="start-date" name="start_date">
                    <label for="end-date">End date:</label>
                    <input type="datetime-local" id="end-date" name="end_date">
                    <input type="hidden" id="per_page" name="per_page" value={{ $per_page ?? '' }}>
                    <input type="submit" value="Search">
                    <br>
                    <input class="align-left" type="button" value="Top 10 least logged in" onclick="window.location.href='/composite_report/least_logged'" />
                    <input class="align-right" type="button" value="Top 10 most logged in" onclick="window.location.href='/composite_report/most_logged'" />
                </form>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number of logins</th>
                            <th>Active</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{count($user->user_accesses)}}</td>
                                <td>{{$user->active ? 'Active' : 'Inactive'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(isset($per_page))
                    <div class="pagination">
                        {{ $users->links() }}
                        <form class="form-inline" method="GET" role="form">
                            <div class="per-page">
                                <label for="per_page">Per Page:  </label>
                                <select class="form-control" id="per_page" name="per_page" onchange="this.form.submit()">
                                    <option value="10" {{$per_page == 10 ? 'selected' : ''}}>10</option>
                                    <option value="20" {{$per_page == 20 ? 'selected' : ''}}>20</option>
                                    <option value="30" {{$per_page == 30 ? 'selected' : ''}}>30</option>
                                    <option value="100" {{$per_page == 100 ? 'selected' : ''}}>100</option>
                                </select>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <div class="links">
                <a href="/"><- Back to index</a>
            </div>
        </div>
    </div>
@endsection
