@extends('layouts.master')

@section('title', 'Product Categories Management')

@section('page-header')
    @section('PageTitle', 'Manage Sliders')
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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sliderModal">Add Slider</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>TYPE</th>
                                    <th>LOCATION</th>
                                    <th>PHOTO</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $slider->name }}</td>
                                        <td>{{ $slider->type }}</td>
                                        <td>{{ $slider->location }}</td>
                                        <td><img src="{{ asset('storage/uploads/' . $slider->photo) }}" alt="{{ $slider->name }}" width="100" height="auto"></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$slider->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$slider->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$slider->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{$slider->id}}">Edit Slider</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-row">
                                                            @foreach (config('app.languages') as $locale => $language)
                                                                <div class="form-group col-md-6">
                                                                    <label for="name_{{ $locale }}_{{ $slider->id }}">{{ __('Name') }} ({{ $language }})</label>
                                                                    <input type="text" class="form-control" id="name_{{ $locale }}_{{ $slider->id }}" name="name_{{ $locale }}" value="{{ $slider->translate($locale)->name ?? '' }}" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="desc_{{ $locale }}_{{ $slider->id }}">{{ __('Description') }} ({{ $language }})</label>
                                                                    <textarea class="form-control" id="desc_{{ $locale }}_{{ $slider->id }}" name="desc_{{ $locale }}" required>{{ $slider->translate($locale)->desc ?? '' }}</textarea>
                                                                </div>
                                                            @endforeach
                                                            <div class="form-group col-md-6">
                                                                <label for="link">Link</label>
                                                                <input type="url" class="form-control" id="link" name="link" value="{{ $slider->link }}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="type">Type</label>
                                                                <select class="form-control" id="type" name="type" required>
                                                                    <option value="الكل" {{ $slider->type === 'الكل' ? 'selected' : '' }}>الكل</option>
                                                                    <option value="الويب" {{ $slider->type === 'الويب' ? 'selected' : '' }}>الويب</option>
                                                                    <option value="التطبيق" {{ $slider->type === 'التطبيق' ? 'selected' : '' }}>التطبيق</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="location">Location</label>
                                                                <select class="form-control" id="location" name="location" required>
                                                                    <option value="اعلي اليمين" {{ $slider->location === 'اعلي اليمين' ? 'selected' : '' }}>اعلي اليمين</option>
                                                                    <option value="اسفل اليمين" {{ $slider->location === 'اسفل اليمين' ? 'selected' : '' }}>اسفل اليمين</option>
                                                                    <option value="اليسار" {{ $slider->location === 'اليسار' ? 'selected' : '' }}>اليسار</option>
                                                                    <option value="رئيسي" {{ $slider->location === 'رئيسي' ? 'selected' : '' }}>رئيسي</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="photo">Upload New Image (Optional)</label>
                                                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview{{$slider->id}}')">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <small>Current Image:</small><br>
                                                                <img src="{{ asset('storage/uploads/' . $slider->photo) }}" alt="{{ $slider->name }}" id="currentImage{{$slider->id}}" width="100" height="auto"><br>
                                                                <small>Image Preview:</small><br>
                                                                <img id="imagePreview{{$slider->id}}" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update Slider</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this record?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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

    <!-- Modal for Adding Slider -->
    <div class="modal fade" id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="sliderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sliderModalLabel">Add Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sliderForm" action="{{ route('sliders.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-row">
                            @foreach (config('app.languages') as $locale => $language)
                                <div class="form-group col-md-6">
                                    <label for="name_{{ $locale }}">{{ __('Name') }} ({{ $language }})</label>
                                    <input type="text" class="form-control" id="name_{{ $locale }}" name="name_{{ $locale }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="desc_{{ $locale }}">{{ __('Description') }} ({{ $language }})</label>
                                    <textarea class="form-control" id="desc_{{ $locale }}" name="desc_{{ $locale }}" required></textarea>
                                </div>
                            @endforeach
                            <div class="form-group col-md-6">
                                <label for="link">Link</label>
                                <input type="url" class="form-control" id="link" name="link" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="الكل">الكل</option>
                                    <option value="الويب">الويب</option>
                                    <option value="التطبيق">التطبيق</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location">Location</label>
                                <select class="form-control" id="location" name="location" required>
                                    <option value="اعلي اليمين">اعلي اليمين</option>
                                    <option value="اسفل اليمين">اسفل اليمين</option>
                                    <option value="اليسار">اليسار</option>
                                    <option value="رئيسي">رئيسي</option>
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
                            <button type="submit" class="btn btn-primary">Save Slider</button>
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