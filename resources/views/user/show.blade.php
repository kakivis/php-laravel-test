@extends('layouts.layout')
@section('content')
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            User Details
        </div>
        <p class="id">{{ $user->id }}</p>
        <p class="name">{{ $user->name }}</p>
        <p class="email">{{ $user->email }}</p>
        <p class="active">{{ $user->active }}</p>

        <div class="links">
        </div>
    </div>
</div>
@endsection
