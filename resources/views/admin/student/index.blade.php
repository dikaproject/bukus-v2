@extends('admin.components.base')

@section('title', 'Students')

@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Students Overview</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Students</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto d-flex align-items-center">
            <a href="{{ route('students.create') }}" class="btn btn-primary me-3">
                <i class="feather-plus me-2"></i>
                <span>Add Student</span>
            </a>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Upload Form ] start -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Upload Students File</h5>
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
                                        <th>NIS</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Jurusan</th>
                                        <th>Angkatan</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->nis }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->kelas }}</td>
                                            <td>{{ $student->jurusan }}</td>
                                            <td>{{ $student->angkatan }}</td>
                                            <td class="text-end">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="feather-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('students.edit', $student->id) }}" class="dropdown-item"><i class="feather-edit"></i>Edit</a>
                                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i class="feather-trash-2"></i>Delete</button>
                                                        </form>
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

    fetch('{{ route('students.import') }}', {
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
            Swal.fire('Success', 'Students imported successfully', 'success').then(() => {
                window.location.href = "{{ route('students.index') }}";
            });
        } else {
            Swal.fire('Error', 'Failed to import Students', 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error', 'Network or server error', 'error');
    });
}
</script>
@endsection
