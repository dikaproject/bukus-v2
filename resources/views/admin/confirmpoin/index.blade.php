@extends('admin.components.base')

@section('title', 'Confirm Points')

@section('content')
<div class="container">
    <h1>Confirm Points</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Poin</th>
                <th>Type</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($poins as $poin)
            <tr>
                <td>{{ $poin->id }}</td>
                <td>{{ $poin->student->name }}</td>
                <td>{{ $poin->poin }}</td>
                <td>{{ $poin->jenis }}</td>
                <td>{{ \Carbon\Carbon::parse($poin->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</td>
                <td>
                    <a href="{{ route('poin.confirm', $poin->id) }}" class="btn btn-success">Confirm</a>
                    <form action="{{ route('poin.destroy', $poin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancel</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
