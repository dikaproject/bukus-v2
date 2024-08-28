@extends('admin.components.base')

@section('title', 'Pasal')

@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Pasals Overview</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pasal</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto d-flex align-items-center">
            <a href="{{ route('pasal.create') }}" class="btn btn-primary me-3">
                <i class="feather-plus me-2"></i>
                <span>Create Pasal</span>
            </a>
        </div>
    </div>
    <!-- [ page-header ] end -->

    @cancan('import-regulation', 'web|admin')
    <!-- [ Upload Form ] start -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Upload Pasals File</h5>
                </div>
                <div class="card-body">
                    <form id="fileUploadForm">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose file</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                        <button type="button" onclick="uploadFile()" class="btn btn-primary w-100">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Upload Form ] end -->
    @endcancan

    <!-- [ Main Content ] start -->
    <div class="main-content mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jenis</th>
                                        <th>Kategori</th>
                                        <th>Kode</th>
                                        <th>Poin</th>
                                        <th>Keterangan</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasals as $pasal)
                                        <tr>
                                            <td>{{ $pasal->id }}</td>
                                            <td>{{ $pasal->jenis }}</td>
                                            <td>{{ $pasal->kategori }}</td>
                                            <td>{{ $pasal->kode }}</td>
                                            <td>{{ $pasal->poin }}</td>
                                            <td>{{ $pasal->keterangan }}</td>
                                            <td class="text-end">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="feather-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        @cancan('regulation-edit', 'web|admin')
                                                        <a href="{{ route('pasal.edit', $pasal->id) }}" class="dropdown-item"><i class="feather-edit"></i>Edit</a>
                                                        @endcancan
                                                        @cancan('regulation-delete', 'web|admin')
                                                        <form action="{{ route('pasal.destroy', $pasal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i class="feather-trash-2"></i>Delete</button>
                                                        </form>
                                                        @endcancan
                                                    </div>
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
    /* Optional: Adjust spacing and layout for upload form and table */
    .card {
        margin-bottom: 20px;
    }

    /* Optional: Enhance button appearance */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function uploadFile() {
    const formData = new FormData(document.getElementById('fileUploadForm'));
    Swal.fire({
        title: 'Uploading...',
        html: 'Please wait while the file is being uploaded.',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        }
    });

    fetch('{{ route('pasal.import') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        Swal.close();
        if (data.success) {
            Swal.fire('Success', 'Pasals imported successfully', 'success').then(() => {
                window.location.href = "{{ route('pasal.index') }}";
            });
        } else {
            Swal.fire('Error', 'Failed to import pasals', 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error', 'Network or server error', 'error');
    });
}
</script>
@endsection
