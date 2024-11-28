@extends('layouts.master')

@section('title', 'Top prefrerd Stores')

@section('page-header')
    @section('PageTitle', 'Top prefrerd Stores')
@endsection

@section('content')
    <div class="container">
        <h1>Top prefered products</h1>
        
        <div class="card">
            <div class="card-header">
                <h4>List of Top 10 Preferred products</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>product Name</th>
                            <th>price</th>
                            <th>type</th>
                            <th>Image</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preferedStores as $rate)
                        <tr>
                            <td>{{ $rate->product->name }}</td>
                            <td>{{ $rate->product->price }}</td>
                            <td>{{ $rate->product->type }}</td>
                        
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