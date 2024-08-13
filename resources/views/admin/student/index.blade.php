@extends('admin.components.base')

@section('title', 'Students')

@section('content')
<div class="page-header">
    <h3 class="page-title">Students</h3>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
            <div class="container mt-4">
                <h2>Upload Students File</h2>
                <form id="fileUploadForm">
                    @csrf
                    <input type="file" name="file" required>
                    <button type="button" onclick="uploadFile()" class="btn btn-primary">Upload</button>
                </form>
            </div>
            <table class="table table-bordered mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th>Actions</th>
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
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
                window.location.href = '{{ route('students.index') }}';
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
