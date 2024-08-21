@extends('admin.components.base')

@section('title', 'Edit Reduction Rule')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Edit Reduction Rule</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Edit Reduction Rule</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('reduces.update', $reduce->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="poin_min" class="form-label">Point Min</label>
                                <input type="number" class="form-control" id="poin_min" name="poin_min" value="{{ $reduce->poin_min }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="poin_max" class="form-label">Point Max</label>
                                <input type="number" class="form-control" id="poin_max" name="poin_max" value="{{ $reduce->poin_max }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="reducepoin_prestasi" class="form-label">Reduction for Prestasi (%)</label>
                                <input type="number" class="form-control" id="reducepoin_prestasi" name="reducepoin_prestasi" value="{{ $reduce->reducepoin_prestasi }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="reducepoin_pelanggaran" class="form-label">Reduction for Hukuman (%)</label>
                                <input type="number" class="form-control" id="reducepoin_pelanggaran" name="reducepoin_pelanggaran" value="{{ $reduce->reducepoin_pelanggaran }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
