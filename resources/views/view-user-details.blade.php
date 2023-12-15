@extends('layouts.mainlayout')

@section('title', 'User Details')

@section('content')

    <h1>User Details</h1>

    <div class="mt-5 w-25">

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" readonly>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" readonly>
        </div>

        <div class="mt-3">
            <a href="/user-list" class="btn btn-secondary">Back to User List</a>
        </div>
    </div>

@endsection
