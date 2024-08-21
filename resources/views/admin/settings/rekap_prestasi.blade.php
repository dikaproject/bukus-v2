@extends('admin.components.base')

@section('title', 'Rekap Poins Berbintang')

@section('content')
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Rekap Data Prestasi</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Settings</a></li>
            <li class="breadcrumb-item">Rekap Data Prestasi</li>
        </ul>
    </div>
   
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body custom-card-action p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Jurusan</th>
                            <th>Poin Prestasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->kelas }}</td>
                            <td>{{ $student->jurusan }}</td>
                            <td>{{ $student->poins->where('jenis', 'Prestasi')->sum('poin') }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
