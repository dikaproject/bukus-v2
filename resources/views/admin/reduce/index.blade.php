@extends('admin.components.base')

@section('title', 'Reduction Rules')

@section('content')
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Reduction Rules Overview</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Reduction Rules</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto d-flex align-items-center">
                <a href="{{ route('reduces.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>Create Rule
                </a>
            </div>
        </div>

        <div class="main-content mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Point Min</th>
                                            <th>Point Max</th>
                                            <th>Reduction for Prestasi</th>
                                            <th>Reduction for Hukuman</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reduces as $reduce)
                                            <tr>
                                                <td>{{ $reduce->id }}</td>
                                                <td>{{ $reduce->poin_min }}</td>
                                                <td>{{ $reduce->poin_max }}</td>
                                                <td>{{ $reduce->reducepoin_prestasi }}%</td>
                                                <td>{{ $reduce->reducepoin_pelanggaran }}%</td>
                                                <td>
                                                    @cancan('reduction-edit', 'web|admin')
                                                    <a href="{{ route('reduces.edit', $reduce->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    @endcancan
                                                    @cancan('reduction-delete', 'web|admin')
                                                    <form action="{{ route('reduces.destroy', $reduce->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this item?');"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                    @endcancan
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
    </div>
@endsection
