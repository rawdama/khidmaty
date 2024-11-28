@extends('layouts.master')

@section('title', 'Admin Management')

@section('page-header')
    @section('PageTitle', 'Update Admin Profile')
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <h3>Update Your Profile</h3>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('admin.updateProfile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>

                    <hr>

                    <h3>Update Your Password</h3>
<form action="{{ route('admin.updatePassword') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="current_password">Current Password:</label>
        <input type="password" class="form-control" id="current_password" name="current_password" required>
    </div>
    <div class="form-group">
        <label for="new_password">New Password:</label>
        <input type="password" class="form-control" id="new_password" name="new_password" required>
    </div>
    <div class="form-group">
        <label for="new_password_confirmation">Confirm New Password:</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Password</button>
</form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    // You can add any JavaScript here if needed
</script>
@endsection