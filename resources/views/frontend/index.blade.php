@extends('layouts.front')

@section('title')
Welcome to E-shop
@endsection

@section('container-fluid')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row ">
        <h2 class="text-center fw-bold mb-3" style="font-size: 2.5rem; color: #333; letter-spacing: 1px;">Featured Product</h2>
            <div class="owl-carousel feature-carousel owl-theme">
                    @foreach ($featured_product as $product)
                    <div class="item">
                        <a href="{{ url('category/'.$product->category->slug.'/'.$product->slug) }}">
                        <div class="card border-light rounded shadow-sm ">
                            <img src="{{ asset('adminmate/uploads/product/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Name: {{ $product->name }}</h5>
                                <span class="float-left">{{ $product->selling_price }}</span>
                                <span class="float-right"><s>{{ $product->original_price }}</s></span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="py-1">
     <div class="container">
        <div class="row ">
        <b><h2 class="text-center fw-bold mb-3" style="font-size: 2.5rem; color: #333; letter-spacing: 1px;">Trending Category</h2></b>
            <div class="owl-carousel feature-carousel owl-theme">
                    @foreach ($popular_category as $product)
                    <div class="item">
                        <a href="{{ url('view-category/'.$product->slug)}}">
                        <div class="card border-light rounded shadow-sm ">
                            <img src="{{ asset('adminmate/uploads/category/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Name: {{ $product->name }}</h5>
                                <span class="float-left">{{ $product->description }}</span>
                                <span class="float-right"><small>{{ $product->meta_title }}</small></span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
      </div>  
    </div>
    @endsection

    @section('scripts')

    <script>
        $('.feature-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>

    @endsection