@extends('admin.components.base')

@section('title', 'Detail Student')

@section('content')
<div class="page-header">
    <h3 class="page-title">Detail Student</h3>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" name="nis" id="nis" class="form-control" value="{{ $student->nis }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Class</label>
                                <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $student->kelas }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ $student->jurusan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <input type="text" name="angkatan" id="angkatan" class="form-control" value="{{ $student->angkatan }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password (Leave blank if not changing)</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="sekolah" class="form-label">Sekolah</label>
                        <input type="text" name="sekolah" id="sekolah" class="form-control" value="SMK Telkom Purwokerto" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Student</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Section Riwayat Pemanggilan -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Riwayat Pemanggilan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Pelapor</th>
                                <th>Level</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayatPemanggilan as $riwayat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $riwayat->nis }}</td>
                                <td>{{ $riwayat->nama }}</td>
                                <td>{{ $riwayat->tanggal }}</td>
                                <td>{{ $riwayat->pelapor }}</td>
                                <td>{{ $riwayat->kode }}</td>
                                <td>{{ $riwayat->pesan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Poin Pelanggaran -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Riwayat Poin Pelanggaran</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Kode</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggaran as $poin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $poin->nis }}</td>
                                <td>{{ $poin->nama }}</td>
                                <td>{{ $poin->kelas }}</td>
                                <td>{{ $poin->kode }}</td>
                                <td>{{ $poin->poin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Poin Prestasi -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Riwayat Poin Prestasi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Kode</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestasi as $poin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $poin->nis }}</td>
                                <td>{{ $poin->nama }}</td>
                                <td>{{ $poin->kelas }}</td>
                                <td>{{ $poin->kode }}</td>
                                <td>{{ $poin->poin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
