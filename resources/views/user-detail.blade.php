@extends('layouts.mainlayout')

@section('title', 'User Detail')

@section('page-name', 'User List')

@section('content')

    <h2>User Detail</h2>

    <div class="mt-1 d-flex justify-content-end">
        @if($user->status == 'inactive')
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-primary me-4">Approve User</a>
        @endif
            <a href="/users" class='btn btn-secondary'>Go Back</a>
    </div>
    <div class='mt-5'>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="my-1 w-25">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{ $user->username }}">
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Phone</label>
        <input type="text" class="form-control" readonly value="{{ $user->phone}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Address</label>
        <textarea name="" id="" cols="30" rows="6" class="form-control" readonly value style="resize:none">{{ $user->address}}</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Status</label>
        <input type="text" class="form-control" readonly value="{{ $user->status}}">
    </div>
    </div>
@endsection
