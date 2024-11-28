@extends('layouts.master')

@section('title', 'Product Categories Management')

@section('page-header')
@section('PageTitle', 'Manage Stores')
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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#storeModal">Add Store</button><br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Offer Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $store->email }}</td>
                                    <td>{{ $store->phone }}</td>
                                    <td>
                                        <img src="{{ asset('storage/uploads/' . $store->photo) }}" alt="{{ $store->name }}" width="100" height="auto">
                                    </td>
                                    <td>
                                        <button type="button" class="btn {{ $store->offer === 'Activated' ? 'btn-success' : 'btn-danger' }}"
                                                onclick="toggleOffer({{ $store->id }}, '{{ $store->offer }}')">
                                            {{ $store->offer }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$store->id}}" title="Edit">
                                            <li class="fa fa-edit"></li>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$store->id}}" title="Delete">
                                            <li class="fa fa-trash"></li>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="delete{{ $store->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Store</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this record?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal for Editing Store -->
<div class="modal fade" id="edit{{ $store->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $store->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $store->id }}">Edit Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editStoreForm{{ $store->id }}" action="{{ route('stores.update', $store->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $store->name }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $store->email }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="countryCode">Country Code</label>
                        <input type="text" class="form-control" id="countryCode" name="countryCode" value="{{ $store->countryCode }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $store->phone }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $store->address }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="product_store_id">Product Store</label>
                        <select class="form-control" id="product_store_id" name="product_store_id" required>
                            @foreach ($productStores as $productstore)
                                <option value="{{ $productstore->id }}" {{ $store->product_store_id == $productstore->id ? 'selected' : '' }}>
                                    {{ $productstore->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="photo">Upload New Image (Optional)</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview{{ $store->id }}')">
                        <small>Current Image:</small><br>
                        <img src="{{ asset('storage/uploads/' . $store->photo) }}" alt="{{ $store->name }}" style="width: 100px; height: auto;">
                        <div class="mt-2">
                            <small>Image Preview:</small><br>
                            <img id="imagePreview{{ $store->id }}" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Commercial_register">Upload New Commercial Register (Optional)</label>
                        <input type="file" class="form-control" id="Commercial_register" name="Commercial_register" accept="application/pdf,image/*">
                        <small>Current Commercial Register:</small><br>
                        @if (pathinfo($store->Commercial_register, PATHINFO_EXTENSION) === 'pdf')
                            <a href="{{ asset('storage/uploads/' . $store->Commercial_register) }}" target="_blank">View PDF</a>
                        @else
                            <img src="{{ asset('storage/uploads/' . $store->Commercial_register) }}" alt="Commercial Register" style="width: 100px; height: auto;">
                        @endif
                    </div>

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding Store -->
<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeModalLabel">Add Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="storeForm" action="{{ route('stores.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                    <div class="form-group col-md-6">
                        <label for="countryCode">Country Code</label>
                        <input type="text" class="form-control" id="countryCode" name="countryCode" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="product_store_id">Product Store</label>
                        <select class="form-control" id="product_store_id" name="product_store_id" required>
                            @foreach ($productStores as $productstore)
                                <option value="{{ $productstore->id }}">{{ $productstore->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="photo">Upload Image</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview')" required>
                    </div>

                    <div class="form-group col-md-6">
                        <small>Image Preview:</small><br>
                        <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Commercial_register">Upload Commercial Register</label>
                        <input type="file" class="form-control" id="Commercial_register" name="Commercial_register" accept="application/pdf,image/*" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
   function displayImage(event, previewId) {
    const preview = document.getElementById(previewId);
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; 
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = "#"; 
        preview.style.display = 'none'; 
    }
}

    function toggleOffer(storeId, currentStatus) {
        const newStatus = currentStatus === 'Not activated' ? 'Activated' : 'Not activated';
        const button = event.target;

        // Update the button text and class
        button.textContent = newStatus;
        button.classList.toggle('btn-danger');
        button.classList.toggle('btn-success');

        // Send AJAX request to update the offer status
        fetch(`/stores/${storeId}/offer`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ offer: newStatus })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Show success notification
            alert(data.success);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
@endsection