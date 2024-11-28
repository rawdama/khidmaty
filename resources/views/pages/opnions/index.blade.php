@extends('layouts.master')

@section('title', 'Car Management')

@section('page-header')
    @section('PageTitle', 'Add Car')
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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#opnionModal">Add opnion</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>IMAGE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($opnions as $opnion)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $opnion->name }}</td>
                                        <td> <img src="{{ asset('storage/uploads/' . $opnion->photo) }}" 
                                        alt="{{ $opnion->name }}" width="100" height="auto"></td>
                                        
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$opnion->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$opnion->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                            <div class="modal fade" id="delete{{$opnion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete brand</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this record?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('opnions.destroy', $opnion->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                                       <!-- Edit Modal for Brands -->
<div class="modal fade" id="edit{{$opnion->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$opnion->id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$opnion->id}}">Edit opnion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('opnions.update', $opnion->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @foreach (config('app.languages') as $locale => $language)
                        <div class="form-group">
                            <label for="name_{{ $locale }}_{{$opnion->id}}">{{ __('name') }} ({{ $language }})</label>
                            <input type="text" class="form-control" id="name_{{ $locale }}_{{$opnion->id}}" name="name_{{ $locale }}" 
                                value="{{ $opnion->translate($locale)->name ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="comment_{{ $locale }}_{{$opnion->id}}">{{ __('comment') }} ({{ $language }})</label>
                            <input type="text" class="form-control" id="_{{ $locale }}_{{$opnion->id}}" name="comment_{{ $locale }}" 
                                value="{{ $opnion->translate($locale)->comment ?? '' }}" required>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="editPhoto{{$opnion->id}}">Upload New Image</label>
                        <input type="file" class="form-control" id="editPhoto{{$opnion->id}}" name="photo" accept="image/*" onchange="displayImage(event, 'editImagePreview{{$opnion->id}}')">
                        <small>Current Image:</small><br>
                        <img src="{{ asset('storage/uploads/' . $opnion->photo) }}" alt="{{ $opnion->name_ar }}" width="100" height="auto">
                        <div class="mt-2">
                            <small>New Image Preview:</small><br>
                            <img id="editImagePreview{{$opnion->id}}" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
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
    <!-- Modal for Adding Questions -->
    <div class="modal fade" id="opnionModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carModalLabel">Add Car Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="carForm" action="{{ route('opnions.store') }}"  enctype="multipart/form-data"method="post">
                    @csrf
                    <div class="form-row">
                        @foreach (config('app.languages') as $locale => $language)
                            <div class="form-group col-md-6">
                                <label for="name_{{ $locale }}">{{ __('name') }} ({{ $language }})</label>
                                <input type="text" class="form-control" id="name_{{ $locale }}" name="name_{{ $locale }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="comment_{{ $locale }}">{{ __('comment') }} ({{ $language }})</label>
                                <input type="text" class="form-control" id="comment_{{ $locale }}" name="comment_{{ $locale }}" required>
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
    </script>
@endsection