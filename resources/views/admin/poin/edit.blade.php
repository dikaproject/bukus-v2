@extends('admin.components.base')

@section('title', 'Edit Poins')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Edit Point</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Edit</li>
            </ul>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Points for Student</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('poin.update', $poin->id) }}" method="POST">
                            @csrf
                            @method('PUT') {{-- Method spoofing untuk mengizinkan update --}}
                            <div class="mb-3">
                                <label for="student" class="form-label">Student Name</label>
                                <select name="nama" id="student" class="form-select">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->name }}" {{ $student->name == $poin->nama ? 'selected' : '' }}>{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pasal" class="form-label">Pasal Code</label>
                                <select name="kode" id="pasal" class="form-select">
                                    @foreach ($pasals as $pasal)
                                        <option value="{{ $pasal->kode }}" {{ $pasal->kode == $poin->kode ? 'selected' : '' }}>
                                            {{ $pasal->kode }} - {{ $pasal->keterangan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Evidence</label>
                                <input type="text" name="bukti" id="bukti" class="form-control" value="{{ $poin->bukti }}">
                            </div>
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Message (Optional)</label>
                                <textarea name="pesan" id="pesan" class="form-control">{{ $poin->pesan }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Points</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection
