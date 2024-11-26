@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection

@section('container-fluid')
<div class="py-5">
    <div class="container">
        <div class="py-3 mb-3 shadow-lg bg-warning border-top">
            <div class="container">
                <h6 class="mb-0 ml-3">Collection / <a href="">{{ $category->name }}</a></h6>
            </div>
        </div>
        <div>
            <h2 class="fw-bold mb-3" style="font-size: 2.5rem; color: #333; letter-spacing: 1px; text-align: left;">{{$category->name}}</h2>
        </div><hr>
        <div class="row ">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card">
                    <a href="{{ url('/category/'.$category->slug.'/'.$product->slug)}}">
                        <img src="{{ asset('adminmate/uploads/product/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="m-2 text-success">Special Price</h6>
                            <b>₹{{ $product->selling_price }}</b>
                            <small><s>₹{{ $product->original_price }}</s></small>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection


<!-- Add this CSS to your stylesheet or in a <style> tag -->
<style>
    .category-title {
        font-size: 2.2rem;       /* Adjusted size for better readability */
        color: #333;             /* Neutral color for better contrast */
        letter-spacing: 0.5px;   /* Slight letter spacing for modern look */
        text-align: left;        /* Aligns text to the left */
        margin-left: 10px;       /* Adds space from the left edge */
        padding-bottom: 10px;    /* Adds slight spacing below for breathing room */
        border-bottom: 2px solid #f0ad4e; /* Optional underline style to separate the heading */
    }
</style>
