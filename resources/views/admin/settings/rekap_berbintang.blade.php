@extends('admin.components.base')

@section('title', 'Rekap Poins Berbintang')

@section('content')
<div class="page-header">
    <!-- Page header content -->
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body custom-card-action p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Jurusan</th>
                            <th>Poin Prestasi</th>
                            <th>Poin Pelanggaran</th>
                            <th>Bintang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->kelas }}</td>
                            <td>{{ $student->jurusan }}</td>
                            <td>{{ $student->poins->where('jenis', 'Prestasi')->sum('poin') }}</td>
                            <td>{{ $student->poins->where('jenis', 'Hukuman')->sum('poin') }}</td>
                            <td>{{ $student->bintang }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
