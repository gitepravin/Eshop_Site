@extends('layouts.admin')

@section('title')
orders
@endsection

@section('container-fluid')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
                        <div class="container">
                            <b>
                                <h2 class="mb-0 ml-1 text-white">New Orders <a class="btn btn-danger float-end text-white" href="{{url('/order-history')}}">Order History</a></h2>
                            </b>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Order Date</th>
                                <th>Tracking No</th>
                                <th>Product Details</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $grandTotal = 0;
                            @endphp
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->mobile }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->tracking_no }}</td>
                                <td>
                                    @php
                                    $productDetails = json_decode($order->product_detail, true); // Decode the JSON into an array
                                    @endphp

                                    <ul>
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
                                <td>
                                    <div class="form-floating">
                                        <form action="{{ url('update-order/'.$order->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="order_status" id="floatingSelect" aria-label="Floating label select example">
                                                <option {{ $order->status=='0'? 'selected':'' }} value="0">Pending</option>
                                                <option {{ $order->status=='1'? 'selected':'' }} value="1">Completed</option>
                                            </select>
                                            <button class="btn btn-primary mt-2" type="submit">Update</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection