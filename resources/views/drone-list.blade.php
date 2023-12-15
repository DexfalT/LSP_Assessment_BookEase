@extends('layouts.mainlayout')

@section('title', 'Drones')

@section('content')
<style>
    .custom-img {
        height: 200px; /* Set the desired height */
        object-fit: cover; /* Optional: maintain aspect ratio and cover the container */
    }
</style>

<div class="my-5">
    <h2 class="mb-4">Available Drones for Rent</h2>
    <div class="row gy-3">
        @foreach ($sportsequip as $item)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/noimage.jpg') }}"
                        class="card-img-top custom-img" alt="Drone Image 1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->equip_code }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="card-text fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                    {{ $item->status }}</p>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary">Rent Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
