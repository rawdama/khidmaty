@extends('layouts.master')

@section('title', 'Admin Management')

@section('page-header')
    @section('PageTitle', 'Add Admin')
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
                <div class="card-body">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#clientModal">Add client</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>SL</th>
                                    <th>NAME</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>PHOTO</th>
                                    <th>OFFER STATUS<th>
                                    <th>ACTION</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>
                                        <img src="{{ asset('storage/uploads/' . $client->photo) }}" 
                                        alt="{{ $client->name }}" width="100" height="auto">
                                        </td>
                                        <td>
                                            <button type="button" class="btn {{ $client->offer === 'Activated' ? 'btn-success' : 'btn-danger' }}"
                                                    onclick="toggleOffer({{ $client->id }}, '{{ $client->offer }}')">
                                                {{ $client->offer }}
                                            </button>
                                        </td>
                                        <td>
                                        
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$client->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$client->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                            <div class="modal fade" id="delete{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete client</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this record?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                                                       <!-- Edit Modal for Brands -->
<div class="modal fade" id="edit{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$client->id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$client->id}}">Edit client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="countryCode">كود الدولة</label>
            <input type="text" class="form-control" id="countryCode" name="countryCode" value="{{ $client->countryCode }}" required>
        </div>
        
        <div class="form-group">
            <label for="phone">الجوال</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $client->phone }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">البريد الالكتروني</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="address">العنوان</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}" required>
        </div>

        <div class="form-group">
            <label for="editPhoto{{$client->id}}">Upload New Image</label>
            <input type="file" class="form-control" id="editPhoto{{$client->id}}" name="photo" accept="image/*" onchange="displayImage(event, 'editImagePreview{{$client->id}}')">
            <small>Current Image:</small><br>
            <img src="{{ asset('storage/uploads/' . $client->photo) }}" alt="{{ $client->name }}" width="100" height="auto">
            <div class="mt-2">
                <small>New Image Preview:</small><br>
                <img id="editImagePreview{{$client->id}}" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Client</button>
        </div>
    </form>
</div>
        </div>
    </div>
</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Admin -->
    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add cleint</h5>
                </div>
                <div class="modal-body">
                    <form id="adminForm" action="{{ route('clients.store') }}" method="post"   enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">كود الدولة</label>
                                <input type="text" class="form-control" id="countryCode" name="countryCode" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">الجوال</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الالكترونى</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                                <label for="phone">العنوان</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        <div class="form-group">
                            <label for="photo"> ارفع صورة</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview')">
                        </div>
                        <div class="form-group">
                            <small>الصورة :</small><br>
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                        </div>
                        
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveAdmin">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function displayImage(event, previewElementId) {
            const imagePreview = document.getElementById(previewElementId);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        }
        function toggleOffer(clientId, currentStatus) {
    const newStatus = currentStatus === 'Not activated' ? 'Activated' : 'Not activated';
    const button = event.target;

    // Update the button text and class
    button.textContent = newStatus;
    button.classList.toggle('btn-danger');
    button.classList.toggle('btn-success');

    // Send AJAX request to update the offer status
    fetch(`/clients/${clientId}/offer`, {  // Ensure the URL matches the defined route
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