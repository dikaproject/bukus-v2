@extends('admin.components.base')

@section('title', 'Add Poins')

@section('content')

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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Points to Student</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('poin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="student" class="form-label">Student Name</label>
                                <select name="nama" id="student" class="form-select">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->name }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pasal" class="form-label">Pasal Code</label>
                                <select name="kode" id="pasal" class="form-select">
                                    @foreach ($pasals as $pasal)
                                        <option value="{{ $pasal->kode }}">{{ $pasal->kode }} - {{ $pasal->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Evidence</label>
                                <input type="text" name="bukti" id="bukti" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Message (Optional)</label>
                                <textarea name="pesan" id="pesan" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Points</button>
                        </form>
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
