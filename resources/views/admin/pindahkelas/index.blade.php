@extends('admin.components.base')

@section('title', 'Pindah Kelas')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Pilih Siswa untuk Dipindahkan</h1>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-3">
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

                    <input type="text" id="searchInput" class="form-control mb-2" placeholder="Cari siswa...">
                    <select id="filterClass" class="form-control mb-4">
                        <option value="">Semua Kelas</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endforeach
                    </select>
                </div>
                <form id="transferForm" action="{{ route('admin.pindahkelas.store') }}" method="POST" class="card">
                    @csrf
                    <table class="table table-hover" id="studentsTable">
                        <thead>
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
                                    <td><input type="checkbox" name="students[]" value="{{ $student->id }}"></td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->kelas }}</td>
                                    <td>{{ $student->jurusan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Siswa yang Dipilih
                    </div>
                    <ul id="selectedStudents" class="list-group list-group-flush">
                    </ul>
                    <div class="card-body">
                        <label for="new_class">Pilih Kelas Baru:</label>
                        <select name="new_class" id="new_class" class="form-control mb-3" form="transferForm">
                            @foreach ($classes as $class)
                                <option value="{{ $class }}">{{ $class }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-primary"
                            onclick="document.getElementById('transferForm').submit()">Konfirmasi Pindah Kelas</button>
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
                    let items = Array.from(list.querySelectorAll('.list-group-item'));
                    let lastItem = items.pop();
                    if (lastItem && lastItem.children.length < 3) {
                        // Membuat span baru dan menambahkannya ke lastItem
                        let span = document.createElement('span');
                        span.textContent = name;
                        lastItem.appendChild(span);
                        lastItem.appendChild(document.createTextNode(' | '));
                    } else {
                        // Membuat item baris baru
                        let item = document.createElement('li');
                        item.className = 'list-group-item';
                        let span = document.createElement('span');
                        span.textContent = name;
                        item.appendChild(span);
                        list.appendChild(item);
                    }
                } else {
                    // Menghapus nama
                    Array.from(list.querySelectorAll('span')).forEach(span => {
                        if (span.textContent === name) {
                            let parent = span.parentNode;
                            parent.removeChild(span.nextSibling); // Menghapus pemisah
                            parent.removeChild(span);
                            if (!parent.hasChildNodes()) {
                                parent.parentNode.removeChild(parent);
                            }
                        }
                    });
                }
            });
        });

        function submitForm() {
            document.getElementById('hiddenSubmitBtn').click(); // Memicu tombol submit yang tersembunyi
        }

        // Fungsi untuk pencarian
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let value = this.value.toLowerCase();
            document.querySelectorAll('#transferForm table tbody tr').forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });

        // Fungsi untuk penyortiran
        document.getElementById('filterClass').addEventListener('change', function() {
            let classFilter = this.value;
            document.querySelectorAll('#transferForm table tbody tr').forEach(row => {
                let cellText = row.cells[2].textContent; // Mengasumsikan kolom kelas adalah yang ketiga
                row.style.display = (cellText === classFilter || classFilter === '') ? '' : 'none';
            });
        });
    </script>
@endsection

@section('css-script')
    <style>
        #selectedStudents span {
            display: inline-block;
            margin-right: 5px;
            white-space: nowrap;
        }

        body {
            background-color: #f8f9fa;
            /* Slightly off-white background for less strain on the eyes */
        }

        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            /* Subtle shadows for cards */
        }

        .card-header {
            background-color: #e9ecef;
            /* Light gray background for headers */
            border-bottom: 1px solid #dee2e6;
            /* Slight separation from the card body */
        }

        .list-group-item {
            border: none;
            /* Remove borders for a cleaner look */
        }

        .btn-primary {
            background-color: #007bff;
            /* A vivid blue that stands out */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
            /* Darken on hover for visual feedback */
        }
    </style>
@endsection
