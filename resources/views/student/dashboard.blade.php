@extends('student.components.base')

@section('title', 'Dashboard')

@section('dashboard')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Dashboard</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">View</li>
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
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand successAlertMessage">
                        <i class="feather-star"></i>
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
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-xxl-4 col-xl-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3">
                                    <img src="{{ asset('assets/images/avatar/1.png') }}" alt="Avatar" class="img-fluid">
                                </div>
                                <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a href="javascript:void(0);" class="fs-14 fw-bold d-block">{{ $student->name }}</a>
                                <a href="javascript:void(0);" class="fs-12 fw-normal text-muted d-block">{{ $student->email }}</a>
                            </div>
                            <div class="fs-12 fw-normal text-muted text-center d-flex flex-wrap gap-3 mb-4">
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">{{ $student->kelas }}</h6>
                                    <p class="fs-12 text-muted mb-0">Kelas</p>
                                </div>
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">{{ $student->poins->where('jenis', 'Hukuman')->count() }}</h6>
                                    <p class="fs-12 text-muted mb-0">Pelanggaran</p>
                                </div>
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">{{ $student->poins->where('jenis', 'Prestasi')->count() }}</h6>
                                    <p class="fs-12 text-muted mb-0">Prestasi</p>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i>Sekolah</span>
                                <a href="javascript:void(0);" class="float-end">{{ $student->sekolah }}</a>
                            </li>
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-star"></i>Jumlah Bintang</span>
                                <a href="javascript:void(0);" class="float-end">{{ $student->bintang }}</a>
                            </li>
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i>Email</span>
                                <a href="javascript:void(0);" class="float-end">{{ $student->email }}</a>
                            </li>
                            <!-- Display last login information -->
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-clock"></i>Last Login Time</span>
                                <a href="javascript:void(0);" class="float-end">{{ session('last_login_at', 'Never') }}</a>
                            </li>
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-map"></i>Last Login IP</span>
                                <a href="javascript:void(0);" class="float-end">{{ session('last_login_ip', 'N/A') }}</a>
                            </li>
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-smartphone"></i>Last Device Used</span>
                                <a href="javascript:void(0);" class="float-end">{{ session('last_device', 'Unknown') }}</a>
                            </li>
                            <li class="hstack justify-content-between mb-0">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-globe"></i>Last Browser Used</span>
                                <a href="javascript:void(0);" class="float-end">{{ session('last_browser', 'Unknown') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-6">
                <div class="card border-top-0">
                    <div class="card-header p-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab">Overview</a>
                            </li>

                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#activityTab" role="tab">Activity</a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                            <div class="profile-details mb-5">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Profile Details:</h5>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Full Name:</div>
                                    <div class="col-sm-6 fw-semibold">{{ $student->name }}</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Email Address:</div>
                                    <div class="col-sm-6 fw-semibold">{{ $student->email }}</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Sekolah :</div>
                                    <div class="col-sm-6 fw-semibold">{{ $student->sekolah }}</div>
                                </div>
                                <div class="row g-0">
                                    <div class="col-sm-6 text-muted">Website:</div>
                                    <div class="col-sm-6 fw-semibold">bukus</div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="activityTab" role="tabpanel">
                            <div class="recent-activity p-4 pb-0">
                                <div class="mb-4 pb-2 d-flex justify-content-between">
                                    <h5 class="fw-bold">Recent Activity:</h5>
                                    @if($poins->isNotEmpty())
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View All</a>
                                    @else
                                        <span class="text-muted">No activities yet</span>
                                    @endif
                                </div>
                                <ul class="list-unstyled activity-feed">
                                    @foreach($poins as $poin)
                                        <li class="d-flex justify-content-between feed-item {{ $poin->isConfirmed() ? 'feed-item-success' : 'feed-item-warning' }}">
                                            <div>
                                                <span class="text-truncate-1-line lead_date">{{ $poin->jenis }}: {{ $poin->pelanggaran }} <span class="date">[{{ $poin->tanggal }}]</span></span>
                                                <span class="text">{{ $poin->pesan ?? 'No additional information' }}</span>
                                            </div>
                                            <div class="ms-3 d-flex gap-2 align-items-center">
                                                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
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
