@extends('admin.components.base')

@section('title', 'Create Reduction Rule')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Create Reduction Rule</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Create Reduction Rule</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('reduces.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="poin_min" class="form-label">Point Min</label>
                                <input type="number" class="form-control" id="poin_min" name="poin_min" required>
                            </div>
                            <div class="mb-3">
                                <label for="poin_max" class="form-label">Point Max</label>
                                <input type="number" class="form-control" id="poin_max" name="poin_max" required>
                            </div>
                            <div class="mb-3">
                                <label for="reducepoin_prestasi" class="form-label">Reduction for Prestasi (%)</label>
                                <input type="number" class="form-control" id="reducepoin_prestasi" name="reducepoin_prestasi" required>
                            </div>
                            <div class="mb-3">
                                <label for="reducepoin_pelanggaran" class="form-label">Reduction for Hukuman (%)</label>
                                <input type="number" class="form-control" id="reducepoin_pelanggaran" name="reducepoin_pelanggaran" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
