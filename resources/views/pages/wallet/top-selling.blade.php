@extends('layouts.master')

@section('title', 'Top Selling Stores')

@section('page-header')
    @section('PageTitle', 'Top Selling Stores')
@endsection

@section('content')
    <div class="container">
        <h1>Top Selling Stores</h1>
        
        <div class="card">
            <div class="card-header">
                <h4>List of Top 10 Selling Stores</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Total Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topStores as $wallet)
                        <tr>
                            <td>{{ $wallet->store->name }}</td>
                            <td>{{ $wallet->store->email }}</td>
                            <td>{{ $wallet->store->phone }}</td>
                        
                            <td><img src="{{ asset('storage/uploads/' . $wallet->store->photo) }}" alt="{{ $wallet->store->name }}" width="100" height="auto"></td>
                            
                            <td>${{ number_format($wallet->total_sales, 2) }}</td>
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