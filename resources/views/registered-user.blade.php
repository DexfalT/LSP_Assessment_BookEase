@extends('layouts.mainlayout')

@section('title', 'User List')

@section('page-name', 'User List')

@section('content')

    <h2>Registered Users (inactivated)</h2>

    <div class="mt-5 d-flex justify-content-end">

        <a href="/users" class="btn btn-primary me-3">See Approved Users List</a>   

    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUsers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ($item->phone)
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}" class="me-4">View And/Or Edit Account</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
