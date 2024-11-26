@extends('layouts.front')

@section('title')
{{ $products->name }}
@endsection

@section('container-fluid')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0 ml-5">Collection / <a href="{{ url('view-category/'.$products->category->slug) }}">{{$products->category->name}}</a> / <a href="">{{ $products->name }}</a></h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('adminmate/uploads/product/' . $products->image) }}" style="height: 85%;" class="w-100" alt="Product Image">
                </div>
                <div class="col-md-8">
                    <h4>{{$products->name}}
                        <label style="font-size: 15px; color: white;" class="float-right badge bg-danger trending_tag">{{ $products->trending == '1' ? 'Trending' : '' }}</label>
                    </h4>
                    <hr>
                    <div class="float-right mb-2">{{$products->description}}</div>
                    <small class="clearfix"></small>
                    <hr>
                    <div class="mt-3">
                        <h6 class="m-2 text-success">Special Price</h6>
                        <b>₹{{$products->selling_price}}</b>
                        <small><s>₹{{$products->original_price}}</s></small>
                        <div>
                            @if ($products->qty > 0)
                            <label class="badge bg-primary">In Stock</label>
                            @else
                            <label class="badge bg-danger">Out Of Stock</label>
                            @endif
                        </div>
                    </div>

                    <div>
                        <input type="hidden" name="" value="{{ $products->id }}" class="prod_id">
                        <label for="quantity">Quantity</label>
                        <div class="input-group mb-2">
                            <button class="btn btn-outline-danger decrement-btn" style="max-height:40px;" type="button" id="decrement">-</button>
                            <input type="text" name="quantity" class="form-control text-center qty-input" style="max-width: 60px; max-height:40px;" value="1" id="quantityInput" />
                            <button class="btn btn-outline-success increment-btn" style="max-height:40px;" type="button" id="increment">+</button>
                            <div class="ml-4 mt-0">
                                <button class="btn btn-primary addToCartBtn m-2">Add to cart <i class="bi bi-cart"></i></button>
                                <button class="btn btn-success m-2">Add to Wishlist <i class="bi bi-heart"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="float-right mb-2">
            <h3 class="">Description</h3>
             {{$products->meta_description}}</div>
        </div>
    </div>
</div>

@endsection


