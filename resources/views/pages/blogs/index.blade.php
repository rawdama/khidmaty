@extends('layouts.master')

@section('title', 'Blog Management')

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
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#blogModal">Add Blog</button><br><br>

        <div class="table-responsive">
            <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                <thead>
                    <tr class="alert-success">
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $blog->name }}
                                <span class="toggle-description" style="cursor: pointer; color: blue; border: 1px solid blue; border-radius: 4px; padding: 2px 5px; background-color: #f0f8ff;">&gt;</span>
                                <div class="description" style="display: none;">
                                    {{ $blog->desc }}
                                </div>
                            </td>
                            <td>{{ $blog->address }}</td>
                           
                            <td><img src="{{ asset('storage/uploads/' . $blog->photo) }}" alt="{{ $blog->name }}" width="100" height="auto"></td>

                            <td>
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$blog->id}}" title="Edit">
                                    <li class="fa fa-edit"></li>
                                </button>

                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$blog->id}}" title="Delete">
                                    <li class="fa fa-trash"></li>
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Blog</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this record?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Blog</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        @foreach (config('app.languages') as $locale => $language)
                                                            <div class="form-group col-md-6">
                                                                <label for="name_{{ $locale }}">{{ __('Name') }} ({{ $language }})</label>
                                                                <input type="text" class="form-control" id="name_{{ $locale }}" name="name_{{ $locale }}" value="{{ $blog->translate($locale)->name ?? '' }}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="desc_{{ $locale }}">{{ __('Description') }} ({{ $language }})</label>
                                                                <input type="text" class="form-control" id="desc_{{ $locale }}" name="desc_{{ $locale }}" value="{{ $blog->translate($locale)->desc ?? '' }}" required>
                                                            </div>
                                                        @endforeach
                                                        <div class="form-group">
                                                            <label for="photo">Upload Image</label>
                                                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview{{$blog->id}}')">
                                                        </div>
                                                        <div class="form-group">
                                                            <small>Image Preview:</small><br>
                                                            <img id="imagePreview{{$blog->id}}" src="{{ asset($blog->photo) }}" alt="Image Preview" style="width: 100px; height: auto;">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
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

<!-- Modal for Adding Blog -->
<div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blogModalLabel">Add Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        @foreach (config('app.languages') as $locale => $language)
                            <div class="form-group col-md-6">
                                <label for="name_{{ $locale }}">{{ __('Name') }} ({{ $language }})</label>
                                <input type="text" class="form-control" id="name_{{ $locale }}" name="name_{{ $locale }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="desc_{{ $locale }}">{{ __('Description') }} ({{ $language }})</label>
                                <input type="text" class="form-control" id="desc_{{ $locale }}" name="desc_{{ $locale }}" required>
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    // Toggle description visibility
    document.querySelectorAll('.toggle-description').forEach(item => {
        item.addEventListener('click', event => {
            const description = item.nextElementSibling;
            description.style.display = description.style.display === 'none' ? 'block' : 'none';
        });
    });

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