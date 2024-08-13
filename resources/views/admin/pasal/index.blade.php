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
        <div class="page-header-right ms-auto">
            <a href="{{ route('pasal.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Create Pasal</span>
            </a>
            <div class="container mt-4">
                <h2>Upload Pasals File</h2>
                <form id="fileUploadForm">
                    @csrf
                    <input type="file" name="file" required>
                    <button type="button" onclick="uploadFile()" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
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
                                                <a href="{{ route('pasal.edit', $pasal->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('pasal.destroy', $pasal->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
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
        onBeforeOpen: () => {
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
