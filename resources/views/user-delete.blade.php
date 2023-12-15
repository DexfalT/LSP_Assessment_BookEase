@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('content')
   <h2>Are you sure about deleting this user "{{$user->username}}"?</h2>
   <div class="mt-5">
    <a href="/user-destroy/{{$user->slug}}" class='btn btn-danger me-4'>Delete User</a>
    <a href="/users" class='btn btn-primary'>Cancel Deletion</a>
   </div>
@endsection
