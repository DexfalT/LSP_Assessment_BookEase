@extends('layouts.mainlayout')

@section('title', 'Delete Drone')

@section('content')
   <h2>Are you sure about deleting the drone "{{$sportsequip->title}}"?</h2>
   <div class="mt-5">
    <a href="/drone-destroy/{{$sportsequip->slug}}" class='btn btn-danger me-4'>Delete Drone</a>
    <a href="/sportsequip" class='btn btn-primary'>Cancel Deletion</a>
   </div>
@endsection
