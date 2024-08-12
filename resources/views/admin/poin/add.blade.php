@extends('admin.components.base')

@section('title', 'dashboard')

@section('dashboard')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Point</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Create</li>
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
                                        <span class="d-block mb-2">Tambah Poin Siswa</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">Mohon Jangan Asal
                                            Melakukan Tambah Poin </span>
                                    </h5>
                                </div>
                                                                <form action="{{ route('permissions.store') }}" method="POST">
                                    @csrf
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="nama_siswa" class="fw-semibold">Nama Siswa: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="nama_siswa" class="form-control select2" id="nama_siswa">
                                                <!-- Options will be populated dynamically -->
                                                <option value="siswa1">Siswa 1</option>
                                                <option value="siswa2">Siswa 2</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="kode_pasal" class="fw-semibold">Kode Pasal: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="kode_pasal" class="form-control select2" id="kode_pasal">
                                                <!-- Options will be populated dynamically -->
                                                <option value="pasal1">Pasal 1</option>
                                                <option value="pasal2">Pasal 2</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                   
                                </form>
                                <form action="{{ route('permissions.store') }}" method="POST">
                                    @csrf
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="name" class="fw-semibold">Bukti </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-user"></i></div>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Bukti">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex align-items-center justify-end gap-4 page-header-right-items-wrapper">
                                        {{-- <a href="" class="btn btn-primary successAlertMessage">
                                        <i class="feather-user-plus me-2"></i>
                                        <span>Create Permissions</span>
                                    </a> --}}
                                       
                                    </div>
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="feather-user-plus me-2"></i>
                                        <span>Tambah Poin</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select an option',
            allowClear: true
        });
    });
</script>
@endsection
