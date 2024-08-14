@extends('admin.components.base')

@section('title', 'dashboard Poins')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Data Poin Siswa</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Poin</li>
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
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne">
                        <i class="feather-bar-chart"></i>
                    </a>
                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                            data-bs-auto-close="outside">
                            <i class="feather-filter"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-eye me-3"></i>
                                <span>All</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-users me-3"></i>
                                <span>Group</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-flag me-3"></i>
                                <span>Country</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-dollar-sign me-3"></i>
                                <span>Invoice</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-briefcase me-3"></i>
                                <span>Project</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-user-check me-3"></i>
                                <span>Active</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-user-minus me-3"></i>
                                <span>Inactive</span>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                            data-bs-auto-close="outside">
                            <i class="feather-paperclip"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-pdf me-3"></i>
                                <span>PDF</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-csv me-3"></i>
                                <span>CSV</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-xml me-3"></i>
                                <span>XML</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-txt me-3"></i>
                                <span>Text</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-exe me-3"></i>
                                <span>Excel</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-printer me-3"></i>
                                <span>Print</span>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('poin.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Tambah Poin</span>
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
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-body custom-card-action p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>NIS</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Points</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($poins as $index => $poin)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $poin->nis }}</td>
                                    <td>{{ $poin->nama }}</td>
                                    <td>{{ $poin->kelas }}</td>
                                    <td>{{ $poin->kode }}</td>
                                    <td>{{ $poin->jenis }}</td>
                                    <td>{{ $poin->poin }}</td>
                                    <td>{{ \Carbon\Carbon::parse($poin->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                    <td>
                                        <a href="{{ route('poin.edit', $poin->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('poin.destroy', $poin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this point?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
