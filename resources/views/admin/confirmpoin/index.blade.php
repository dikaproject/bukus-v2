@extends('admin.components.base')

@section('title', 'Confirm Points')

@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Confirm Points</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Confirm Points</li>
            </ul>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Pending Points Confirmation</h5>
                        <!-- Search Form -->
                        <form class="d-flex" action="" method="GET">
                            <input type="text" name="search" class="form-control" placeholder="Search Students...">
                            <button type="submit" class="btn btn-secondary ms-2">Search</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Poin</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($poins as $poin)
                                    <tr>
                                        <td>{{ $poin->id }}</td>
                                        <td>{{ $poin->student->name ?? "NULL" }}</td>
                                        <td>{{ $poin->poin }}</td>
                                        <td>{{ $poin->jenis }}</td>
                                        <td>{{ \Carbon\Carbon::parse($poin->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a href="{{ route('poin.confirm', $poin->id) }}" class="btn btn-success me-2">Confirm</a>
                                                <a href="{{ route('poin.cancel', $poin->id) }}" class="btn btn-danger me-2">Cancel</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection

@section('style')
<style>
    .nxl-content {
        padding: 20px;
    }

    .page-header {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .page-header-title h5 {
        margin: 0;
    }

    .breadcrumb {
        background: none;
        margin: 0;
        padding: 0;
    }

    .card {
        margin-bottom: 20px;
        border: 1px solid #e3e6f0;
        border-radius: 5px;
    }

    .card-header {
        background: #f8f9fa;
        padding: 20px;
        border-bottom: 1px solid #e3e6f0;
    }

    .card-title {
        margin: 0;
    }

    .table {
        margin: 0;
        padding: 0;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 5px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success:hover,
    .btn-danger:hover {
        opacity: 0.8;
    }

    .d-flex {
        display: flex;
        align-items: center;
    }

    .me-2 {
        margin-right: 0.5rem;
    }
</style>
@endsection
