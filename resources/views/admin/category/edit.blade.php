@extends('layouts.admin')

@section('container-fluid')
<div class="card">
    <div class="card-header">
        <h1>Edit/Update Category</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="fw-bold">Name</label>
                    <input type="text" id="name" value="{{ $category->name }}" class="form-control border border-2" name="name" placeholder="Enter category name">
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label for="slug" class="fw-bold">Slug</label>
                    <input type="text" id="slug" value="{{ $category->slug }}" class="form-control border border-2" name="slug" placeholder="Enter category slug">
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-3">
                    <label for="description" class="fw-bold">Description</label>
                    <textarea id="description" class="form-control border border-2" name="description" rows="4" placeholder="Enter category description">{{ $category->description }}</textarea>
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                    <label for="status" class="fw-bold">Status</label><br>
                    <input type="checkbox" id="status"  name="status" {{ $category->status=="1" ? 'checked':' '}}> Active
                </div>

                <!-- Popular -->
                <div class="col-md-6 mb-3">
                    <label for="popular" class="fw-bold">Popular</label><br>
                    <input type="checkbox" id="popular"  name="popular" {{ $category->popular=="1" ? 'checked':' '}}> Mark as Popular
                </div>

                <!-- Meta Title -->
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="fw-bold">Meta Title</label>
                    <input type="text" id="meta_title" value="{{ $category->meta_title }}" class="form-control border border-2" name="meta_title" placeholder="Enter meta title">
                </div>

                <!-- Meta Description -->
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="fw-bold">Meta Description</label>
                    <textarea id="meta_description" class="form-control border border-2" name="meta_description" rows="3" placeholder="Enter meta description">{{ $category->meta_descrip }}</textarea>
                </div>

                <!-- Meta Keywords -->
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="fw-bold">Meta Keywords</label>
                    <textarea id="meta_keywords" class="form-control border border-2" name="meta_keywords" rows="3" placeholder="Enter meta keywords">{{ $category->meta_keywords }}</textarea>
                </div>

                @if ($category->image)
                    <img src="{{asset('adminmate/uploads/category/'.$category->image)}}" alt="Category-Image">
                    
                @endif
                <!-- Image Upload -->
                <div class="col-md-12 mb-3">
                    <label for="image" class="fw-bold">Category Image</label>
                    <input type="file" id="image" class="form-control border border-2" name="image">
                </div>

                <!-- Submit Button -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
