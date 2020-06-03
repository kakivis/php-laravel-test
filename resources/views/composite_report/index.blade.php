@extends('layouts.layout')
@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Composite Report
            </div>
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

            <div class="links">
                <a href="/"><- Back to index</a>
            </div>
        </div>
    </div>
@endsection
