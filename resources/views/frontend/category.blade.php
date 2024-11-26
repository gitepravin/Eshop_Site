@extends('layouts.front')

@section('title')
Category
@endsection

@section('container-fluid')
<div class="py-5">
    <div class="container">
        <div class="row">
        <b><h2 class="text-center fw-bold mb-3" style="font-size: 2.5rem; color: #333; letter-spacing: 1px;">All Categories</h2></b>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($category as $cate)
                    <div class="col-md-4">
                        <a href="{{ url('view-category/'.rawurlencode($cate->slug))}}">
                        <div class="card">
                        <img src="{{ asset('adminmate/uploads/category/' . $cate->image) }}" class="card-img-top" alt="{{ $cate->name }}" style="height: 200px; object-fit: cover;">                           
                            <div class="card-body">
                                        <h5 class="card-title fw-bold">Name: {{ $cate->name }}</h5>
                                        <p>{{$cate->description}}</p>
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