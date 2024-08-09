@extends('admin.components.base')

@section('title', 'Add / Edit Role Permission')

@section('roles')

    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Roles</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Edit</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                <div class="card-body personal-info">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Edit Roles: {{ $role->name }}</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">Mohon Jangan Asal
                                                Melakukan Edit Roles Permissions! </span>
                                        </h5>
                                    </div>

                                    <form action="{{ route('roles.attachPermissions', $role->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-4">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Role Name:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="{{ $role->name }}" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <label class="fw-semibold">Current Permissions:</label>
                                                <ul class="list-group">
                                                    @foreach ($role->permissions as $permission)
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            {{ $permission->name }}
                                                            <form action=""></form>
                                                            <button type="button" class="btn btn-danger btn-sm remove-permission" data-permission-id="{{ $permission->id }}">
                                                                <i class="feather-x"></i>
                                                            </button>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <div class="col-lg-6">
                                                <label class="fw-semibold">Available Permissions:</label>
                                                <select class="form-control" data-select2-selector="permissions" name="permissions[]" multiple>
                                                    @foreach ($permissions as $permission)
                                                        @if (!in_array($permission->name, $rolePermissions))
                                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-end gap-4 page-header-right-items-wrapper">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="feather-save me-2"></i>
                                                <span>Update Permissions</span>
                                            </button>
                                        </div>
                                    </form>

                                    <script>
                                    $(document).ready(function() {
                                        $('[data-select2-selector="permissions"]').select2();

                                        $('.remove-permission').on('click', function() {
                                            $(this).closest('li').remove();
                                        });
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection

