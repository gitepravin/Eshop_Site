@extends('layouts.front')

@section('title')
My Order
@endsection

@section('container-fluid')
<div class="container">
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <b>
                <h2 class="mb-0 ml-1 text-white">Your Orders <a class="btn btn-danger float-right text-white" href="{{url('/')}}">Back</a></h2>

            </b>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Tracking No</th>
                <th>Product Details</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $grandTotal = 0; // Initialize grand total
            @endphp
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->mobile }}</td>
                <td>{{ $order->tracking_no }}</td>
                <td>
                    @php
                    $productDetails = json_decode($order->product_detail, true); // Decode the JSON into an array
                    @endphp
                        @if(is_array($productDetails))
                        @foreach ($productDetails as $detail)
                        @php
                        // Safely retrieve the necessary details from the array
                        $prodQty = $detail['prod_qty'] ?? '0'; // Access product quantity
                        $prodPrice = $detail['prod_price'] ?? '0'; // Access product price
                        $prodName = $detail['prod_name'] ?? 'Unknown'; // Access product name
                        @endphp
                        <li>
                            {{ $prodName }} - Qty: {{ $prodQty }}, Price: ₹{{ $prodPrice }}/item
                        </li>
                        @endforeach
                        @else
                        <li>No product details available.</li>
                        @endif

                        </ul>
                </td>


                <td>₹ {{ $order->total_price }}</td>
                @php
                $grandTotal += $order->total_price; // Add to grand total
                @endphp
                <td>
                    @if ($order->status == 0)
                    <span class="badge bg-warning p-2 text-white">Pending</span>
                    @elseif ($order->status == 1)
                    <span class="badge bg-success p-2 text-white">Delivered</span>
                    @endif
                </td>
                <td><a href="{{ url('cancel-order/'.$order->id) }}" class="cancel-order-btn" data-id="{{ $order->id }}"><span class="badge bg-danger p-2 text-white">Cancel Order</span></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="py-3">
        <h4 class="text-end">Grand Total: ₹ {{ $grandTotal }}</h4>
    </div>
</div>
@endsection