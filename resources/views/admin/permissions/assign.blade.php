@extends('layouts.admin')
@section('title', 'Assign Permissions')
@section('content')

<style>
    .form-check-input {
        transform: scale(1.8);
        /* Increase the size of the slider */
        margin-right: 10px;
        /* Add spacing between the slider and the label */
    }

    .permission-container {
        padding: 15px;
        /* Add spacing inside each permission box */
        border-radius: 8px;
        /* Smooth corners */
        border: 1px solid #e5e5e5;
        /* Light border for separation */
        background-color: #f8f9fa;
        /* Subtle background color */
    }

    .permission-container:hover {
        background-color: #e9ecef;
        /* Slight hover effect */
    }

    .card {
        padding: 20px;
        /* Increase padding of the card */
    }

    .row-cols-1 .col {
        margin-bottom: 15px;
        /* Add spacing between permission items */
    }
</style>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Assign Permissions</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Assign Permissions</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Assign</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assign Permissions</h4>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.storeAssign') }}" class="form-group">
                                @csrf

                                <!-- Roles Dropdown -->
                                <div class="mb-4">
                                    <label for="roleSelect" class="form-label fs-5 fw-bold">Select Role</label>
                                    <select class="form-select" id="roleSelect" name="role_id">
                                        <option value="" disabled selected>Choose a Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Permissions Grid -->
                                <div class="mb-4">
                                    <label class="form-label fs-5 fw-bold">Permissions</label>
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        @foreach ($permissions as $permission)
                                            <div class="col">
                                                <div
                                                    class="form-check form-switch d-flex align-items-center shadow-sm p-2 rounded bg-light">

                                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                    <input class="form-check-input m-2" type="checkbox"
                                                        id="permission_{{ $permission->id }}" name="permissions[]"
                                                        value="{{ $permission->id }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                        <i class="fas fa-user-check me-2"></i> Assign Permissions
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection