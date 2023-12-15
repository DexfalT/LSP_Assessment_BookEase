    @extends('layouts.mainlayout')

    @section('title', 'Drone Rent')

    @section('content')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <div class="container mt-1">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Drone Rent Form</h2>
                            <div class='mt-5'>
                                @if (session('message'))
                                    <div class="alert {{session('alert-class')}}">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                            <form action="/drone-rent" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="user" class="form-label">Select User</label>
                                    <select class="form-select userbox" id="user" name="user" required>
                                        <option value="" disabled selected>Select User</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="drone" class="form-label">Select Drone Model</label>
                                    <select class="form-select userbox" id="drone" name="sportequip_id" required>
                                        <option value="" disabled selected>Select Drone Model</option>
                                        @foreach ($sportsequip as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.userbox').select2();
            });
        </script>
    @endsection
