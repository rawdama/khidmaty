@extends('layouts.master')

@section('title', 'Brand Management')

@section('page-header')
    @section('PageTitle', 'Add brand')
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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#BrandModal">Add Brand</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>BRAND</th>
                                    <th>IMAGE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->brandName }}</td>
                                        <td>
                                            <img src="{{ asset('storage/uploads/' . $brand->image) }}" alt="{{ $brand->brandName }}" width="100" height="auto">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$brand->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$brand->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>

                                           <!-- Edit Modal for Brands -->
<div class="modal fade" id="edit{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$brand->id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$brand->id}}">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @foreach (config('app.languages') as $locale => $language)
                        <div class="form-group">
                            <label for="brandName_{{ $locale }}_{{$brand->id}}">{{ __('Brand Name') }} ({{ $language }})</label>
                            <input type="text" class="form-control" id="brandName_{{ $locale }}_{{$brand->id}}" name="brandName_{{ $locale }}" 
                                value="{{ $brand->translate($locale)->brandName ?? '' }}" required>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="editPhoto{{$brand->id}}">Upload New Image</label>
                        <input type="file" class="form-control" id="editPhoto{{$brand->id}}" name="photo" accept="image/*" onchange="displayImage(event, 'editImagePreview{{$brand->id}}')">
                        <small>Current Image:</small><br>
                        <img src="{{ asset('storage/uploads/' . $brand->image) }}" alt="{{ $brand->brandName_ar }}" width="100" height="auto">
                        <div class="mt-2">
                            <small>New Image Preview:</small><br>
                            <img id="editImagePreview{{$brand->id}}" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
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

                                            <div class="modal fade" id="delete{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete brand</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this record?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
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

    <!-- Modal for Adding Cars -->
    <div class="modal fade" id="BrandModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carModalLabel">Add Car Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="carForm" action="{{ route('brands.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            @foreach (config('app.languages') as $locale => $language)
                                <div class="form-group col-md-6">
                                    <label for="brandName_{{ $locale }}">{{ __('Brand Name') }} ({{ $language }})</label>
                                    <input type="text" class="form-control" id="brandName_{{ $locale }}" name="brandName_{{ $locale }}" required>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="photo">Upload Image</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview')">
                        </div>
                        <div class="form-group">
                            <small>Image Preview:</small><br>
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
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
    </script>
@endsection