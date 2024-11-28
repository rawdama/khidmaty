@extends('layouts.master')

@section('title', 'Top Selling Products')

@section('page-header')
    @section('PageTitle', 'Top Selling Products')
@endsection

@section('content')
    <div class="container">
        <h1>Top Selling Products</h1>
        
        <div class="card">
            <div class="card-header">
                <h4>List of Top 10 Most Selling Products</h4>
                <h5>Total Sold Quantity: {{ $totalSold }}</h5> <!-- Display total sold quantity -->
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Sold Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->type }}</td>
                            <td>
                                <img src="{{ asset('storage/uploads/' . $product->photo) }}" alt="{{ $product->name }}" width="100" height="auto">
                            </td>
                            <td>{{ $product->order_items_count }}</td> <!-- Change to order_items_count -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    
@endsection