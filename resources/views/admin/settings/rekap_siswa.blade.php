@extends('admin.components.base')

@section('title', 'Rekap Siswa Per Kelas')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Rekap Data Siswa Per Kelas</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Settings</a></li>
                <li class="breadcrumb-item">Rekap Data Siswa Per Kelas</li>
            </ul>
        </div>

        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <form class="d-flex me-3" method="GET" action="{{ route('settings.poins-siswa') }}">
                        <input type="text" class="form-control" name="search" placeholder="Search by NIS & Name"
                            value="{{ request('search') }}">

                        <!-- Class Filter Dropdown -->
                        <select name="kelas" class="form-control ms-2">
                            <option value="">All Classes</option>
                            @foreach($classes as $class)
                                <option value="{{ $class }}" {{ request('kelas') == $class ? 'selected' : '' }}>
                                    {{ $class }}
                                </option>
                            @endforeach
                        </select>

                        <button class="btn btn-secondary ms-2" type="submit">Search</button>
                    </form>

                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                            data-bs-auto-close="outside">
                            <i class="feather-paperclip"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{ route('export.siswa', request()->all()) }}" class="dropdown-item">
                                <i class="bi bi-filetype-exe me-3"></i>
                                <span>Excel</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Rest of your content -->
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
                                <th>Poin Pelanggaran</th>
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
                                    <td>{{ $student->poins->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar')->sum('poin') }}</td>
                                    <td>{{ $student->poins->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar')->sum('poin') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        {{ $students->withQueryString()->links('pagination::bootstrap-5') }}
                        <span>Total: {{ $students->total() }} students</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection