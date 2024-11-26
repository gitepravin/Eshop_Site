@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('container-fluid')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0 ml-5">Home / Cart</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow-lg product_data">
        <div class="card-body">
            @php
            $total=0;
            @endphp
            @foreach ($cartitems as $item)
            <div class="row mb-3">
                <div class="col-md-2">
                    <img src="{{ asset('adminmate/uploads/product/'.$item->products->image) }}" class="img-fluid" alt="Product Image" style="max-height: 150px;">
                </div>
                <div class="col-md-5">
                    <h4>{{ $item->products->name }}</h4>
                    <h6 class="m-2 text-success">Special Price</h6>
                    <b>₹{{ $item->products->selling_price }}</b>
                    <small><s>₹{{ $item->products->original_price }}</s></small>
                </div>
                <div class="col-md-3">
                    <input type="hidden" name="" value="{{ $item->prod_id }}" class="prod_id">
                    <label for="quantity">Quantity</label>
                    <div class="input-group mb-2">
                        <button class="btn btn-outline-danger decrement-btn changeQuantity" style="max-height:40px;" type="button">-</button>
                        <input type="text" name="quantity" class="form-control text-center qty-input" style="max-width:60px; max-height:40px;" value="{{ $item->prod_qty }}" />
                        <button class="btn btn-outline-success increment-btn changeQuantity" style="max-height:40px;" type="button">+</button>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart-item"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @php
            $total+= $item->products->selling_price * $item->prod_qty;
            @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h4>Total Price:₹ {{ $total }} </h4>
            <div class="col-md-2">
              <a href="/place-order"><button class="btn btn-success place-order-btn"><i class="bi bi-add"></i> Place order</button></a> 
            </div>
        </div>
    </div>
</div>

@endsection