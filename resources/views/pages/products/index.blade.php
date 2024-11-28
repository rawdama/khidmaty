@extends('layouts.master')

@section('title', 'Products Management')

@section('page-header')
    @section('PageTitle', 'Manage Products')
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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#productModal">Add Product</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>price with offer</th>
                                    <th>Department</th>
                                    <th>Store</th>
                                    <th>Offer</th>
                                    <th>Orders</th>
                                    <th>Average Rating</th> 
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->final_price }}</td> 
                                        <td>{{ $product->productDepartment->name ?? 'N/A' }}</td>
                                        <td>{{ $product->store->name ?? 'N/A' }}</td>
                                        <td>{{ $product->offer }}</td>
                                        <td>
                                            @if($product->orderItems()->exists())
                                                <a href="{{ route('orders.index', ['product_id' => $product->id]) }}" class="btn btn-info btn-sm">View Orders</a>
                                            @else
                                                <span class="text-muted">No orders for this product.</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('ratings.index', ['product_id' => $product->id]) }}" class="btn btn-info btn-sm">
                                                {{ number_format($product->averageRating(), 1) ?? 'N/A' }}
                                        </td>
                                        
                                        <td>
                                            <img src="{{ asset('storage/uploads/' . $product->photo) }}" alt="{{ $product->name }}" width="100" height="auto">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $product->id }}" title="Edit">
                                                <li class="fa fa-edit"></li>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $product->id }}" title="Delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                        </td>
                                    </tr>
                                           <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete product </h5>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this record?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
<!-- Edit Confirmation Modal -->
<div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        @foreach (config('app.languages') as $locale => $language)
                            <div class="form-group col-md-6">
                                <label for="name_{{ $locale }}">{{ __('Name') }} ({{ $language }})</label>
                                <input type="text" class="form-control" id="name_{{ $locale }}" name="name_{{ $locale }}" value="{{ $product->translate($locale)->name ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="desc_{{ $locale }}">{{ __('Description') }} ({{ $language }})</label>
                                <textarea class="form-control" id="desc_{{ $locale }}" name="desc_{{ $locale }}" required>{{ $product->translate($locale)->desc ?? '' }}</textarea>
                            </div>
                        @endforeach
                        
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $product->code }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="اصلي" {{ $product->type == 'اصلي' ? 'selected' : '' }}>اصلي</option>
                                <option value="مقلد" {{ $product->type == 'مقلد' ? 'selected' : '' }}>مقلد</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="model">Model (Year)</label>
                            <select class="form-control" id="model" name="model" required>
                                <option value="" disabled>Select Year</option>
                                @php
                                    $currentYear = date('Y');
                                    for ($year = 2000; $year <= $currentYear; $year++) {
                                        $selected = $year == $product->model ? 'selected' : '';
                                        echo "<option value=\"$year\" $selected>$year</option>";
                                    }
                                @endphp
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="offerCheckbox{{ $product->id }}" 
                                    name="offerCheckbox" 
                                    value="يوجد عرض" 
                                    onclick="toggleEditOfferFields('{{ $product->id }}')" 
                                    {{ $product->offer == 'يوجد عرض' ? 'checked' : '' }}>
                                <label class="form-check-label" for="offerCheckbox{{ $product->id }}">
                                    يوجد عرض
                                </label>
                            </div>
                        </div>

                        <div id="offerFields{{ $product->id }}" style="display: {{ $product->offer == 'يوجد عرض' ? 'block' : 'none' }};">
                            <div class="form-group col-md-6">
                                <label for="offer_type">Offer Type</label>
                                <select class="form-control" id="offer_type" name="offer_type">
                                    <option value="قيمة" {{ $product->offer_type == 'قيمة' ? 'selected' : '' }}>قيمة</option>
                                    <option value="نسبة %" {{ $product->offer_type == 'نسبة %' ? 'selected' : '' }}>نسبة %</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="offer_value">Offer Value</label>
                                <input type="text" class="form-control" id="offer_value" name="offer_value" value="{{ $product->offer_value }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="from_date">From Date</label>
                                <input type="date" class="form-control" id="from_date" name="from_date" value="{{ $product->from_date }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="to_date">To Date</label>
                                <input type="date" class="form-control" id="to_date" name="to_date" value="{{ $product->to_date }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="product_department_id">Product Department</label>
                            <select class="form-control" id="product_department_id" name="product_department_id" required>
                                @foreach ($productDepartments as $department)
                                    <option value="{{ $department->id }}" {{ $department->id == $product->product_department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="product_type_id">Product Type</label>
                            <select class="form-control" id="product_type_id" name="product_type_id" required>
                                @foreach ($productTypes as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $product->product_type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="store_id">Store</label>
                            <select class="form-control" id="store_id" name="store_id" required>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}" {{ $store->id == $product->store_id ? 'selected' : '' }}>{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="brand_id">Brand</label>
                            <select class="form-control" id="brand_id" name="brand_id" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brandName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}" {{ $car->id == $product->car_id ? 'selected' : '' }}>{{ $car->carType }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="photo">Upload Image</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="displayImage(event, 'imagePreview{{ $product->id }}')">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <small>Image Preview:</small><br>
                            <img id="imagePreview{{ $product->id }}" src="{{ asset('storage/uploads/' . $product->photo) }}" alt="Image Preview" style="width: 100px; height: auto;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
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



   <!-- Modal for Adding Product -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="اصلي">اصلي</option>
                                <option value="مقلد">مقلد</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="model">Model (Year)</label>
                            <select class="form-control" id="model" name="model" required>
                                <option value="" disabled selected>Select Year</option>
                                @php
                                    $currentYear = date('Y');
                                    for ($year = 2000; $year <= $currentYear; $year++) {
                                        echo "<option value=\"$year\">$year</option>";
                                    }
                                @endphp
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="offerCheckbox" name="offerCheckbox" value="يوجد عرض" onclick="toggleOfferFields()">
                                <label class="form-check-label" for="offerCheckbox">
                                    يوجد عرض
                                </label>
                            </div>
                        </div>

                        <div id="offerFields" style="display: none;">
                            <div class="form-group col-md-6">
                                <label for="offer_type">Offer Type</label>
                                <select class="form-control" id="offer_type" name="offer_type">
                                    <option value="قيمة">قيمة</option>
                                    <option value="نسبة %">نسبة %</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="offer_value">Offer Value</label>
                                <input type="text" class="form-control" id="offer_value" name="offer_value">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="from_date">From Date</label>
                                <input type="date" class="form-control" id="from_date" name="from_date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="to_date">To Date</label>
                                <input type="date" class="form-control" id="to_date" name="to_date">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="product_department_id">Product Department</label>
                            <select class="form-control" id="product_department_id" name="product_department_id" required>
                                @foreach ($productDepartments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="product_type_id">Product Type</label>
                            <select class="form-control" id="product_type_id" name="product_type_id" required>
                                @foreach ($productTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="store_id">Store</label>
                            <select class="form-control" id="store_id" name="store_id" required>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="brand_id">Brand</label>
                            <select class="form-control" id="brand_id" name="brand_id" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brandName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="car_id">Car</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->carType }}</option>
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
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('js')
<script>
    // Function to display the uploaded image
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

    
    function toggleOfferFields() {
    const offerCheckbox = document.getElementById('offerCheckbox');
    const offerFields = document.getElementById('offerFields');
    offerFields.style.display = offerCheckbox.checked ? 'block' : 'none';
}

function toggleEditOfferFields(productId) {
    const offerCheckbox = document.getElementById(`offerCheckbox${productId}`);
    const offerFields = document.getElementById(`offerFields${productId}`);
    offerFields.style.display = offerCheckbox.checked ? 'block' : 'none';
}</script>
@endsection