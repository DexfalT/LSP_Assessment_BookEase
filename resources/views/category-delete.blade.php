@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
   <h2>Are you sure about deleting the category "{{$category->name}}"?</h2>
   <div>
    <a href="/category-destroy/{{$category->slug}}" class='btn btn-danger me-4'>Delete Category</a>
    <a href="/categories" class='btn btn-info'>Cancel Deletion</a>
   </div>
@endsection
