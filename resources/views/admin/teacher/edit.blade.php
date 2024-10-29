{{-- resources/views/admins/edit.blade.php --}}
@extends('admin.components.base')

@section('title', 'Edit Guru & Tim Disiplin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Guru & Tim Disiplin</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $admin->nik }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" required>
                                <option value="Guru">Guru ( Walas )</option>
                                <option value="Tim Disiplin">Tim Disiplin</option>
                                <option value="Ketua Tim Disiplin">Ketua Tim Disiplin</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
