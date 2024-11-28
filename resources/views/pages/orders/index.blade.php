@extends('layouts.master')

@section('title', 'Orders')

@section('page-header')
    @section('PageTitle', 'Orders List')
@endsection

@section('content')
    <div class="container">
        <h1>Orders</h1>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Total Price</th>
                                <th>Address</th>
                                <th>Client Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->client->name ?? 'N/A' }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="showOrderDetails({{ $order->id }})">Show</button>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function showOrderDetails(orderId) {
            $.ajax({
                url: '/orders/' + orderId,
                type: 'GET',
                success: function(data) {
                    // Fill in the order details logic
                    // ...
                },
                error: function() {
                    alert('Could not retrieve order details.');
                }
            });
        }
    </script>
@endsection