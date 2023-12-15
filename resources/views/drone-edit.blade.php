@extends('layouts.mainlayout')

@section('title', 'Edit Drone')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Edit Drones</h1>

    <div class="mt-5 w-25">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/drone-edit/{{$sportsequip->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="equip_code" id="code" class="form-control" placeholder="Drone Code"
                    value="{{ $sportsequip->equip_code }}">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Drone Name"
                    value="{{ $sportsequip->title }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="Image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="currentImage" class="form-label" style="display:block">Current Image</label>
                @if ($sportsequip->cover!='')
                    <img src="{{ asset('storage/cover/'.$sportsequip->cover) }}" alt="" width="300px">
                @else
                    <img src="{{ asset('images/nocover.jpg') }}" alt="" width="300">
                @endif
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ in_array($category->id, $sportsequip->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="currentCategory">Current Category</label>
                <ul>
                    @foreach ($sportsequip->categories as $category)
                        <li>{{ $category-> name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="Submit">Save</button>
                <button class="btn btn-secondary" type="button" onclick="window.location.href='/sportsequip'">Cancel</button>

            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>

@endsection
