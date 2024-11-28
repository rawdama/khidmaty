@extends('layouts.master')

@section('title', 'Top Selling Stores')

@section('page-header')
    @section('PageTitle', 'Top Selling Stores')
@endsection

@section('content')
    <div class="container">
        <h1>Top prefered stores</h1>
        
        <div class="card">
            <div class="card-header">
                <h4>List of Top 10 Preferred stores</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preferedStores as $rate)
                        <tr>
                            <td>{{ $rate->store->name }}</td>
                            <td>{{ $rate->store->email }}</td>
                            <td>{{ $rate->store->phone }}</td>
                        
                            <td><img src="{{ asset('storage/uploads/' . $rate->store->photo) }}" alt="{{ $rate->store->name }}" width="100" height="auto"></td>
                            
                            <td>{{ number_format($rate->rating, 2) }}</td>
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