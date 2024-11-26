@extends('layouts.admin')

@section('container-fluid')
<div class="card">
    <div class="card-header">
        <h1>Add Product</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 mb-3">
            <label class="fw-bold">Select a Category Name</label>
                    <select class="custom-select fw-bold" name="cate_id">
                        <option class="fw-bold" selected>Open this select menu</option>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="row">
                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="fw-bold">Name</label>
                    <input type="text" id="name" class="form-control border border-2" name="name" placeholder="Enter product name">
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label for="slug" class="fw-bold">Slug</label>
                    <input type="text" id="slug" class="form-control border border-2" name="slug" placeholder="Enter product slug">
                </div>

                <!-- Small Description -->
                <div class="col-md-12 mb-3">
                    <label for="small_description" class="fw-bold">Small Description</label>
                    <textarea id="small_description" class="form-control border border-2" name="small_description" rows="2" placeholder="Enter small description"></textarea>
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-3">
                    <label for="description" class="fw-bold">Description</label>
                    <textarea id="description" class="form-control border border-2" name="description" rows="4" placeholder="Enter full product description"></textarea>
                </div>

                <!-- Original Price -->
                <div class="col-md-6 mb-3">
                    <label for="originial_price" class="fw-bold">Original Price</label>
                    <input type="number" id="original_price" class="form-control border border-2" name="original_price" placeholder="Enter original price">
                </div>

                <!-- Selling Price -->
                <div class="col-md-6 mb-3">
                    <label for="selling_price" class="fw-bold">Selling Price</label>
                    <input type="number" id="selling_price" class="form-control border border-2" name="selling_price" placeholder="Enter selling price">
                </div>

                <!-- Tax -->
                <div class="col-md-6 mb-3">
                    <label for="tax" class="fw-bold">Tax</label>
                    <input type="number" id="tax" class="form-control border border-2" name="tax" placeholder="Enter tax percentage">
                </div>

                <!-- qty -->
                <div class="col-md-6 mb-3">
                    <label for="tax" class="fw-bold">Quantity</label>
                    <input type="number" id="tax" class="form-control border border-2" name="qty" placeholder="Enter tax percentage">
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                    <label for="status" class="fw-bold">Status</label><br>
                    <input type="checkbox" id="status" name="status"> Active
                </div>

                <!-- Trending -->
                <div class="col-md-6 mb-3">
                    <label for="trending" class="fw-bold">Trending</label><br>
                    <input type="checkbox" id="trending" name="trending"> Mark as Trending
                </div>

                <!-- Meta Title -->
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="fw-bold">Meta Title</label>
                    <input type="text" id="meta_title" class="form-control border border-2" name="meta_title" placeholder="Enter meta title">
                </div>

                <!-- Meta Keywords -->
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="fw-bold">Meta Keywords</label>
                    <textarea id="meta_keywords" class="form-control border border-2" name="meta_keywords" rows="3" placeholder="Enter meta keywords"></textarea>
                </div>

                <!-- Meta Description -->
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="fw-bold">Meta Description</label>
                    <textarea id="meta_description" class="form-control border border-2" name="meta_description" rows="3" placeholder="Enter meta description"></textarea>
                </div>

                 <!-- Image Upload -->
                 <div class="col-md-12 mb-3">
                    <label for="image" class="fw-bold">Product Image</label>
                    <input type="file" id="image" class="form-control border border-2" name="image">
                </div>

                <!-- Submit Button -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
