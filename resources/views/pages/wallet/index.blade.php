<!-- resources/views/pages/ratings/show.blade.php -->
@extends('layouts.master')

@section('title', 'Wallet Details')

@section('page-header')
    @section('PageTitle', 'Wallet Details')
@endsection

@section('content')
    <div class="container">
        <h1>Wallet Details</h1>
        
        <div class="card">
            <div class="card-header">
              
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>TOTAL SALES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($storeData as $data)
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['email'] }}</td>
                            <td>{{ $data['phone'] }}</td>
                            <td>{{ number_format($data['total_sales'], 2) }}</td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection

@section('js')
    <!-- Optional JavaScript -->
    <!-- Add any additional JavaScript if needed -->
@endsection