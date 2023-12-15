@extends('layouts.mainlayout')

@section('title', 'Deleted Drones')

@section('page-name', 'dashboard')

@section('content')
    <h1>Deleted Drone List</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-5 d-flex justify-content-end">
        <a href="/sportsequip" class="btn btn-primary">Back</a>
    </div>

    <div class='mt-5'>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedDrones as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->equip_code}}</td>
                        <td> {{ $item->title }} </td>
                        <td>
                            <a href="/drone-restore/{{ $item->slug }}">restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
