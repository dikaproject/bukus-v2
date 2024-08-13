@extends('admin.components.base')

@section('title', 'Add Student')

@section('content')
<div class="page-header">
    <h3 class="page-title">Add Student</h3>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" id="nis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Class</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="text" name="angkatan" id="angkatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="sekolah" class="form-label">Sekolah</label>
                    <input type="text" name="sekolah" id="sekolah" class="form-control" value="SMK Telkom Purwokerto" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Add Student</button>
            </form>
        </div>
    </div>
</div>
@endsection
