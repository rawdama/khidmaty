@extends('layouts.master')

@section('title', 'Product Categories Management')

@section('page-header')
    @section('PageTitle', 'Add Category')
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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#productStoreModal">Add Category</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>PHOTO</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ProductStores as $productStore)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $productStore->name }}</td>
                                        <td><img src="{{ asset('storage/uploads/' . $productStore->photo) }}" alt="{{ $productStore->name }}" width="100" height="auto"></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$productStore->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$productStore->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                        </td>
                                        <div class="modal fade" id="delete{{ $productStore->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this record?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('product-store.destroy', $productStore->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="edit{{$productStore->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$productStore->id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$productStore->id}}">Edit opnion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product-store.update', $productStore->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @foreach (config('app.languages') as $locale => $language)
                        <div class="form-group">
                            <label for="name_{{ $locale }}_{{$productStore->id}}">{{ __('name') }} ({{ $language }})</label>
                            <input type="text" class="form-control" id="name_{{ $locale }}_{{$productStore->id}}" name="name_{{ $locale }}" 
                                value="{{ $productStore->translate($locale)->name ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="desc_{{ $locale }}_{{$productStore->id}}">{{ __('comment') }} ({{ $language }})</label>
                            <input type="text" class="form-control" id="_{{ $locale }}_{{$productStore->id}}" name="desc_{{ $locale }}" 
                                value="{{ $productStore->translate($locale)->desc ?? '' }}" required>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="editPhoto{{$productStore->id}}">Upload New Image</label>
                        <input type="file" class="form-control" id="editPhoto{{$productStore->id}}" name="photo" accept="image/*" onchange="displayImage(event, 'editImagePreview{{$productStore->id}}')">
                        <small>Current Image:</small><br>
                        <img src="{{ asset('storage/uploads/' . $productStore->photo) }}" alt="{{ $productStore->name_ar }}" width="100" height="auto">
                        <div class="mt-2">
                            <small>New Image Preview:</small><br>
                            <img id="editImagePreview{{$productStore->id}}" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Products -->
    <div class="modal fade" id="productStoreModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="carForm" action="{{ route('product-store.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            @foreach (config('app.languages') as $locale => $language)
                                <div class="form-group col-md-6">
                                    <label for="name_{{ $locale }}">{{ __('name') }} ({{ $language }})</label>
                                    <input type="text" class="form-control" id="name_{{ $locale }}" name="name_{{ $locale }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="desc_{{ $locale }}">{{ __('desc') }} ({{ $language }})</label>
                                    <textarea class="form-control" id="desc_{{ $locale }}" name="desc_{{ $locale }}" required></textarea>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="photo">Upload Image</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview')">
                            </div>
                            <div class="form-group">
                                <small>Image Preview:</small><br>
                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveCar">Save changes</button>
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

    // Initialize CKEditor for each locale
    document.addEventListener('DOMContentLoaded', function() {
        @foreach (config('app.languages') as $locale => $language)
            CKEDITOR.replace('desc_{{ $locale }}', {
                height: 300 // Set a height for the editor
            });
        @endforeach
    });
</script>
@endsection