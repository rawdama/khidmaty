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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AdminModal">Add Admin</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>SL</th>
                                    <th>NAME</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->phone }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$admin->id}}" title="edit">
                                                <li class="fa fa-edit"></li>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$admin->id}}" title="delete">
                                                <li class="fa fa-trash"></li>
                                            </button>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="delete{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Admin</h5>
                                                            
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this record?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


<!-- Edit Admin Modal -->
<div class="modal fade" id="edit{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$admin->id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$admin->id}}">Edit Admin</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admins.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">الجوال</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الالكترونى</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                    </div>
                    <!-- Tabs for Clients and Settings -->
                    <ul class="nav nav-tabs" id="editAdminTab{{$admin->id}}" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="edit-clients-tab{{$admin->id}}" data-toggle="tab" href="#edit-clients{{$admin->id}}" role="tab" aria-controls="clients" aria-selected="true">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="edit-settings-tab{{$admin->id}}" data-toggle="tab" href="#edit-settings{{$admin->id}}" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="editAdminTabContent{{$admin->id}}">
                        <!-- Clients Tab -->
                        <div class="tab-pane fade show active" id="edit-clients{{$admin->id}}" role="tabpanel" aria-labelledby="edit-clients-tab{{$admin->id}}">
                            <div class="form-group">
                                <label>الصلاحيات</label>
                                <input type="hidden" name="permissions[clients]" value="[]">
                                
                                @php
                                    $permissionsArray =  $admin->permissions ?? [];
                                @endphp

                                <div class="border p-3">
                                    <input type="checkbox" name="permissions[clients][create]" value="1" {{ isset($permissionsArray['clients']['create']) ? 'checked' : '' }}> Create<br>
                                    <input type="checkbox" name="permissions[clients][read]" value="1" {{ isset($permissionsArray['clients']['read']) ? 'checked' : '' }}> Read<br>
                                    <input type="checkbox" name="permissions[clients][update]" value="1" {{ isset($permissionsArray['clients']['update']) ? 'checked' : '' }}> Update<br>
                                    <input type="checkbox" name="permissions[clients][delete]" value="1" {{ isset($permissionsArray['clients']['delete']) ? 'checked' : '' }}> Delete<br>
                                </div>
                            </div>
                        </div>
                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="edit-settings{{$admin->id}}" role="tabpanel" aria-labelledby="edit-settings-tab{{$admin->id}}">
                            <div class="form-group">
                                <label>الصلاحيات</label>
                                <input type="hidden" name="permissions[settings]" value="[]">

                                <div class="border p-3">
                                    <input type="checkbox" name="permissions[settings][create]" value="1" {{ isset($permissionsArray['settings']['create']) ? 'checked' : '' }}> Create<br>
                                    <input type="checkbox" name="permissions[settings][read]" value="1" {{ isset($permissionsArray['settings']['read']) ? 'checked' : '' }}> Read<br>
                                    <input type="checkbox" name="permissions[settings][update]" value="1" {{ isset($permissionsArray['settings']['update']) ? 'checked' : '' }}> Update<br>
                                    <input type="checkbox" name="permissions[settings][delete]" value="1" {{ isset($permissionsArray['settings']['delete']) ? 'checked' : '' }}> Delete<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Admin</button>
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
<!-- Modal for Admin -->
<div class="modal fade" id="AdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
            </div>
            <div class="modal-body">
                <form id="adminForm" action="{{ route('admins.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">الجوال</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الالكترونى</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <!-- Tabs for Clients and Settings -->
                    <ul class="nav nav-tabs" id="adminTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="clients-tab" data-toggle="tab" href="#clients" role="tab" aria-controls="clients" aria-selected="true">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="adminTabContent">
                        <!-- Clients Tab -->
                        <div class="tab-pane fade show active" id="clients" role="tabpanel" aria-labelledby="clients-tab">
                            <div class="form-group">
                                <label>الصلاحيات</label>
                                <input type="hidden" name="permissions" value="[]">
                                <div class="border p-3">
                                    <input type="checkbox" id="selectAllClients" onclick="toggleSelectAll('clients')"> Select All<br>
                                    <input type="checkbox" name="permissions[clients][create]" value="1"> Create<br>
                                    <input type="checkbox" name="permissions[clients][read]" value="1"> Read<br>
                                    <input type="checkbox" name="permissions[clients][update]" value="1"> Update<br>
                                    <input type="checkbox" name="permissions[clients][delete]" value="1"> Delete<br>
                                </div>
                            </div>
                        </div>
                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="form-group">
                                <label>الصلاحيات</label>
                                <div class="border p-3">
                                    <input type="checkbox" id="selectAllSettings" onclick="toggleSelectAll('settings')"> Select All<br>
                                    <input type="checkbox" name="permissions[settings][create]" value="1"> Create<br>
                                    <input type="checkbox" name="permissions[settings][read]" value="1"> Read<br>
                                    <input type="checkbox" name="permissions[settings][update]" value="1"> Update<br>
                                    <input type="checkbox" name="permissions[settings][delete]" value="1"> Delete<br>
                                </div>
                            </div>
                        </div>
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
    // Function to toggle 'Select All' checkbox in a given tab (clients or settings)
    function toggleSelectAll(tab) {
        const selectAllCheckbox = document.getElementById(`selectAll${tab.charAt(0).toUpperCase() + tab.slice(1)}`);
        const checkboxes = document.querySelectorAll(`#${tab} input[type="checkbox"][name^="permissions[${tab}]"]`);

        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }

    // Ensure the correct tab is active when the modal is opened
    $('#AdminModal').on('shown.bs.modal', function () {
        $('#clients-tab').tab('show'); // Ensure the first tab (Clients) is visible when modal opens
    });

    // Ensure the correct tab is active when the edit modal is opened
    $('#edit{{$admin->id}}').on('shown.bs.modal', function () {
        $('#edit-clients-tab{{$admin->id}}').tab('show'); // Ensure the first tab (Clients) is visible when modal opens
    });

    // Optional: Ensure clicking a tab works if needed
    $('#adminTab a, #editAdminTab{{$admin->id}} a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
</script>
@endsection


