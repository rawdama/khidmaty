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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#CarModal">Add Car</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>CAR TYPE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $car)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $car->carType }}</td>
                                        
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$car->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$car->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>
                                            <div class="modal fade" id="delete{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete car</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this record?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <!-- Edit Modal -->
        <div class="modal fade" id="edit{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Car Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('cars.update', $car->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @foreach (config('app.languages') as $locale => $language)
                                <div class="form-group">
                                    <label for="carType_{{ $locale }}_{{$car->id}}">{{ __('Car Type') }} ({{ $language }})</label>
                                    <input type="text" class="form-control" id="carType_{{ $locale }}_{{$car->id}}" name="carType_{{ $locale }}" 
                                        value="{{$car->translate($locale)->carType ?? '' }}" required>
                                </div>
                                
                            @endforeach
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Car Type</button>
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
    <div class="modal fade" id="CarModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carModalLabel">Add Car Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="carForm" action="{{ route('cars.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        @foreach (config('app.languages') as $locale => $language)
                            <div class="form-group col-md-6">
                                <label for="carType_{{ $locale }}">{{ __('Car Type') }} ({{ $language }})</label>
                                <input type="text" class="form-control" id="carType_{{ $locale }}" name="carType_{{ $locale }}" required>
                            </div>
                        @endforeach
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

@endsection