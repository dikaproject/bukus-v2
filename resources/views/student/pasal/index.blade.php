@extends('student.components.base')

@section('title', 'Pasal')

@section('dashboard')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Pasals Overview</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item">Pasal</li>
            </ul>
        </div>

    </div>
    <!-- [ page-header ] end -->

    <!-- [ Upload Form ] start -->

    <!-- [ Upload Form ] end -->

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
