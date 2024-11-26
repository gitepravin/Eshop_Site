@extends('layouts.admin')

@section('container-fluid')
<div class="container mt-4">
    <h1 class="mb-4">Categories</h1>
    <div class="row">
        @foreach($category as $category)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4"> <!-- Adjusted columns for different screen sizes -->
            <div class="card border-light shadow-sm">
                <img src="{{ asset('adminmate/uploads/category/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Item: {{ $category->id }}</h5>
                    <h5 class="card-title fw-bold">Name: {{ $category->name }}</h5>
                    <p class="card-text">Description: {{ Str::limit($category->description, 100) }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ url('edit-category/'.$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ url('delete-category/'.$category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
