@extends('layouts.master')

@section('title', 'Product Departments Management')

@section('page-header')
    @section('PageTitle', 'Manage Product Departments')
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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#departmentModal">Add Product Department</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productDepartments as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td><img src="{{ asset('storage/uploads/' . $department->photo) }}" alt="{{ $department->name }}" width="100" height="auto"></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $department->id }}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $department->id }}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="delete{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete product department</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this record?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('product-departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $department->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $department->id }}">Edit Product Department</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('product-departments.update', $department->id) }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-row">
                                                            @foreach (config('app.languages') as $locale => $language)
                                                                <div class="form-group col-md-6">
                                                                    <label for="name_{{ $locale }}_{{ $department->id }}">{{ __('Name') }} ({{ $language }})</label>
                                                                    <input type="text" class="form-control" id="name_{{ $locale }}_{{ $department->id }}" name="name_{{ $locale }}" value="{{ $department->translate($locale)->name ?? '' }}" required>
                                                                </div>
                                                            @endforeach
                                                            <div class="form-group col-md-6">
                                                                <label for="product_store_id">Product Store</label>
                                                                <select class="form-control" id="product_store_id" name="product_store_id" required>
                                                                    @foreach ($productStores as $store)
                                                                        <option value="{{ $store->id }}" {{ $store->id == $department->product_store_id ? 'selected' : '' }}>{{ $store->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="photo">Upload New Image (Optional)</label>
                                                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview{{ $department->id }}')">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <small>Current Image:</small><br>
                                                                <img src="{{ asset('storage/uploads/' . $department->photo) }}" alt="{{ $department->name }}" id="currentImage{{ $department->id }}" width="100" height="auto"><br>
                                                                <small>Image Preview:</small><br>
                                                                <img id="imagePreview{{ $department->id }}" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update Product Department</button>
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

    <!-- Modal for Adding Product Department -->
    <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="departmentModalLabel">Add Product Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="departmentForm" action="{{ route('product-departments.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            @foreach (config('app.languages') as $locale => $language)
                                <div class="form-group col-md-6">
                                    <label for="name_{{ $locale }}">{{ __('Name') }} ({{ $language }})</label>
                                    <input type="text" class="form-control" id="name_{{ $locale }}" name="name_{{ $locale }}" required>
                                </div>
                            @endforeach
                            <div class="form-group col-md-6">
                                <label for="product_store_id">Product Store</label>
                                <select class="form-control" id="product_store_id" name="product_store_id" required>
                                    @foreach ($productStores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photo">Upload Image</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview')">
                            </div>
                            <div class="form-group col-md-6">
                                <small>Image Preview:</small><br>
                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Product Department</button>
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
</script>
@endsection