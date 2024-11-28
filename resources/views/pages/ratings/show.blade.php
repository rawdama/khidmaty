@extends('layouts.master')

@section('title', 'Rating Details')

@section('page-header')
    @section('PageTitle', 'Rating Details')
@endsection

@section('content')
    <div class="container">
        <h1>Rating Details</h1>
        
        @if($firstRating)
            <div class="card">
                <div class="card-header">
                    Rating for: {{ $firstRating->product->name ?? 'N/A' }} <!-- Access product from firstRating -->
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Client Name</strong></td>
                                <td>{{ $firstRating->client->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Comment</strong></td>
                                <td>{{ $firstRating->comment ?? 'No comment' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Rating</strong></td>
                                <td>{{ $firstRating->rating }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created At</strong></td>
                                <td>{{ $firstRating->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('ratings.index') }}" class="btn btn-secondary">Back to Ratings</a>
                    <a href="{{ route('ratings.edit', $firstRating->id) }}" class="btn btn-warning">Edit Rating</a>
                    <form action="{{ route('ratings.destroy', $firstRating->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this rating?');">Delete Rating</button>
                    </form>
                </div>
            </div>
        @else
            <p>No ratings found for this product.</p>
        @endif
    </div>
@endsection

@section('js')
    <!-- Optional JavaScript -->
    <!-- Add any additional JavaScript if needed -->
@endsection