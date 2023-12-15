@extends('layouts.mainlayout')

@section('title', 'Banned Users List')

@section('content')
    <h2>Banned User List</h2>

    <div class='mt-5'>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
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

                @forelse ($bannedUsers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ( $item->phone )
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/user-restore/{{ $item->slug }}" class="me-4">Restore</a>
                        </td>
                    </tr>
                @endforeach
                <div class="mt-1 d-flex justify-content-end"> 
                    <a href="/users" class='btn btn-secondary'>Go Back</a>
                </div>

            </tbody>
        </table>
    </div>
@endsection
