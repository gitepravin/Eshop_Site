@extends('layouts.admin')

@section('container-fluid')
<div class="card">
    <div class="card-header">
        <h1>Edit/Update Product</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$products->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12 mb-3">
                <label class="fw-bold">Select a Category Name</label>
                <select class="custom-select fw-bold" name="cate_id">
                    <option class="fw-bold" selected>Open this select menu</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $products->cate_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="fw-bold">Name</label>
                    <input type="text" id="name" value="{{ $products->name }}" class="form-control border border-2" name="name" placeholder="Enter category name">
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label for="slug" class="fw-bold">Slug</label>
                    <input type="text" id="slug" value="{{ $products->slug }}" class="form-control border border-2" name="slug" placeholder="Enter category slug">
                </div>

                <!-- small_Description -->
                <div class="col-md-12 mb-3">
                    <label for="small_description" class="fw-bold">Small Description</label>
                    <textarea id="small_description" class="form-control border border-2" name="small_description" rows="4" placeholder="Enter category small description">{{ $products->small_description }}</textarea>
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-3">
                    <label for="description" class="fw-bold">Description</label>
                    <textarea id="description" class="form-control border border-2" name="description" rows="4" placeholder="Enter category description">{{ $products->description }}</textarea>
                </div>

                <!-- Original Price -->
                <div class="col-md-6 mb-3">
                    <label for="originial_price" class="fw-bold">Original Price</label>
                    <input type="number" id="original_price" class="form-control border border-2" value="{{ $products->original_price }}" name="original_price" placeholder="Enter original price">
                </div>

                <!-- Selling Price -->
                <div class="col-md-6 mb-3">
                    <label for="selling_price" class="fw-bold">Selling Price</label>
                    <input type="number" id="selling_price" class="form-control border border-2" value="{{ $products->selling_price }}" name="selling_price" placeholder="Enter selling price">
                </div>

                <!-- Tax -->
                <div class="col-md-6 mb-3">
                    <label for="tax" class="fw-bold">Tax</label>
                    <input type="number" id="tax" class="form-control border border-2" name="tax" value="{{ $products->tax }}" placeholder="Enter tax percentage">
                </div>

                <!-- qty -->
                <div class="col-md-6 mb-3">
                    <label for="tax" class="fw-bold">Quantity</label>
                    <input type="number" id="tax" class="form-control border border-2" name="qty" value="{{ $products->qty }}" placeholder="Enter tax percentage">
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                    <label for="status" class="fw-bold">Status</label><br>
                    <input type="checkbox" id="status" name="status" {{ $products->status=="1" ? 'checked':' '}}> Active
                </div>

                <!-- Popular -->
                <div class="col-md-6 mb-3">
                    <label for="popular" class="fw-bold">Popular</label><br>
                    <input type="checkbox" id="popular" name="popular" {{ $products->popular=="1" ? 'checked':' '}}> Mark as Popular
                </div>

                <!-- Meta Title -->
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="fw-bold">Meta Title</label>
                    <input type="text" id="meta_title" value="{{ $products->meta_title }}" class="form-control border border-2" name="meta_title" placeholder="Enter meta title">
                </div>

                <!-- Meta Description -->
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="fw-bold">Meta Description</label>
                    <textarea id="meta_description" class="form-control border border-2" name="meta_description" rows="3" placeholder="Enter meta description">{{ $products->meta_description }}</textarea>
                </div>

                <!-- Meta Keywords -->
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="fw-bold">Meta Keywords</label>
                    <textarea id="meta_keywords" class="form-control border border-2" name="meta_keywords" rows="3" placeholder="Enter meta keywords">{{ $products->meta_keywords }}</textarea>
                </div>

                @if ($products->image)
                <img src="{{asset('adminmate/uploads/product/'.$products->image)}}" alt="products-Image">

                @endif
                <!-- Image Upload -->
                <div class="col-md-12 mb-3">
                    <label for="image" class="fw-bold">products Image</label>
                    <input type="file" id="image" class="form-control border border-2" name="image">
                </div>

                <!-- Submit Button -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection