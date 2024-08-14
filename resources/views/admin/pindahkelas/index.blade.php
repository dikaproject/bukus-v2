@extends('admin.components.base')

@section('title', 'Pindah Kelas')

@section('content')
    <div class="container-fluid">
        <div class="page-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="page-header-title">
                    <h4>Home</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard"></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pindah Kelas</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Pilih Siswa untuk Dipindahkan</h5>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                @if (session('notifications'))
                                    <ul>
                                        @foreach (session('notifications') as $notification)
                                            <li>{{ $notification }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari siswa...">
                        </div>
                        <div class="input-group mb-4">
                            <select id="filterClass" class="form-control">
                                <option value="">Semua Kelas</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class }}">{{ $class }}</option>
                                @endforeach
                            </select>
                        </div>
                        <form id="transferForm" action="{{ route('admin.pindahkelas.store') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mt-4" id="studentsTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Select</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Jurusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td><input type="checkbox" name="students[]" value="{{ $student->id }}">
                                                </td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->kelas }}</td>
                                                <td>{{ $student->jurusan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Siswa yang Dipilih</h5>
                    </div>
                    <div class="card-body">
                        <ul id="selectedStudents" class="list-group list-group-flush mb-3"></ul>
                        <div class="form-group">
                            <label for="new_class">Pilih Kelas Baru:</label>
                            <select name="new_class" id="new_class" class="form-control mb-3" form="transferForm">
                                @foreach ($classes as $class)
                                    <option value="{{ $class }}">{{ $class }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-primary w-100"
                                onclick="document.getElementById('transferForm').submit()">Konfirmasi Pindah Kelas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelectorAll('input[name="students[]"]').forEach(input => {
            input.addEventListener('change', function() {
                const list = document.getElementById('selectedStudents');
                let name = this.closest('tr').cells[1].textContent;

                if (this.checked) {
                    let item = document.createElement('li');
                    item.className = 'list-group-item';
                    item.textContent = name;
                    list.appendChild(item);
                } else {
                    Array.from(list.children).forEach(item => {
                        if (item.textContent === name) {
                            list.removeChild(item);
                        }
                    });
                }
            });
        });

        document.getElementById('searchInput').addEventListener('keyup', function() {
            let value = this.value.toLowerCase();
            document.querySelectorAll('#studentsTable tbody tr').forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });

        document.getElementById('filterClass').addEventListener('change', function() {
            let classFilter = this.value;
            document.querySelectorAll('#studentsTable tbody tr').forEach(row => {
                let cellText = row.cells[2].textContent;
                row.style.display = (cellText === classFilter || classFilter === '') ? '' : 'none';
            });
        });
    </script>
@endsection

@section('css')
    <style>
        .page-header {
            margin-bottom: 20px;
        }

        .breadcrumb {
            background-color: #f8f9fa;
            margin-bottom: 0;
        }

        .card {
            border: 1px solid #e3e6f0;
            border-radius: 0.35rem;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        .card-title {
            margin-bottom: 15px;
        }

        .table {
            margin-bottom: 0;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        #selectedStudents .list-group-item {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        #selectedStudents span {
            display: inline-block;
            margin-right: 5px;
            white-space: nowrap;
        }

        .input-group,
        .table,
        .form-group,
        .list-group-item {
            margin-bottom: 1rem;
        }

        /* Added margin for spacing */
        .table {
            margin-top: 1.5rem;
        }

        .breadcrumb {
            margin-bottom: 1rem;
        }
    </style>
@endsection
