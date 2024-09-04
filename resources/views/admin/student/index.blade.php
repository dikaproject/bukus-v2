@extends('admin.components.base')

@section('title', 'Students')

@section('content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Data Siswa</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Data Siswa</li>
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
                        <form class="d-flex me-3" method="GET" action="{{ route('students.index') }}">
                            <input type="text" class="form-control" name="search" placeholder="Search by NIK & Name"
                                value="{{ request('search') }}">
                            <button class="btn btn-secondary ms-2" type="submit">Search</button>
                        </form>
                        <div class="dropdown">
                            <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                data-bs-auto-close="outside">
                                <i class="feather-paperclip"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('export.students') }}" class="dropdown-item">
                                    <i class="bi bi-filetype-pdf me-3"></i>
                                    <span>EXCEL</span>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('students.create') }}" class="btn btn-primary me-3">
                            <i class="feather-plus me-2"></i>
                            <span>Add Student</span>
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
                                                        <a href="javascript:void(0);" class="text-dark"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="feather-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="{{ route('students.edit', $student->id) }}"
                                                                class="dropdown-item"><i class="feather-edit"></i>Edit</a>
                                                            <a href="{{ route('students.detail', $student->id) }}"
                                                                class="dropdown-item"><i class="feather-eye"></i>View</a>
                                                            <form action="{{ route('students.destroy', $student->id) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Are you sure?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"><i
                                                                        class="feather-trash-2"></i>Delete</button>
                                                            </form>
                                                            {{-- Reset Password --}}
                                                            <form
                                                                action="{{ route('students.reset-password', $student->id) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Are you sure?')">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item"><i
                                                                        class="feather-trash-2"></i>Reset Password</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $students->links('pagination::bootstrap-5') }}
                                </div>

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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
                    $('#studentTable').DataTable({
                        "pagingType": "full_numbers", // Paging style
                        "lengthChange": true, // Allow user to change record count
                        "searching": true, // Enable search
                        "ordering": true, // Enable sorting
                        "info": true, // Show table info
                        "autoWidth": false, // Disable auto column width
                        "responsive": true, // Enable responsiveness
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Cari siswa..."
                        }
                    });

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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content')
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

@section('css-script')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
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

        /* Style adjustments for DataTables */
        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 18px;
            /* adjust padding */
            border-bottom: 1px solid #ddd;
            /* consistent border */
        }

        table.dataTable.no-footer {
            border-bottom: none;
            /* remove bottom border */
        }
    </style>
@endsection
