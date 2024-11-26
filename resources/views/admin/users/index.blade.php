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
                                <h2 class="mb-0 ml-1 text-white">Registered Users <a class="btn btn-danger float-end text-white" href="{{url('/dashboard')}}">Back</a></h2>
                            </b>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->mobile }}</td>
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