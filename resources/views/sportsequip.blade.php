@extends('layouts.mainlayout')

@section('title', 'Drones')

@section('page-name', 'Drones')

@section('content')
    <h2>Drone List</h2>

    <div class="my-5 d-flex justify-content-end">
        <a href="drone-deleted" class="btn btn-secondary me-3">View Deleted Data</a>
        <a href="drone-add" class="btn btn-primary">Add Data</a>
    </div>

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
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sportsequip as $item)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$item->equip_code }}</td>
                        <td>{{$item->title }}</td>
                        <td>
                            <ul>
                                @foreach ($item->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="/drone-edit/{{$item->slug}}">edit</a>
                            <a href="/drone-delete/{{$item->slug}}">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
