@extends('student.components.base')

@section('title', 'dashboard')

@section('dashboard')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Customers</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                                    <img src="assets/images/avatar/1.png" alt="" class="img-fluid">
                                </div>
                                <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a href="javascript:void(0);" class="fs-14 fw-bold d-block"> Arya Fathdillah Adi Saputra</a>
                                <a href="javascript:void(0);" class="fs-12 fw-normal text-muted d-block">541221044@student.smktelkom-pwt.sch.id</a>
                            </div>
                            <div class="fs-12 fw-normal text-muted text-center d-flex flex-wrap gap-3 mb-4">
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">XII PPLG 2</h6>
                                    <p class="fs-12 text-muted mb-0">Kelas</p>
                                </div>
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">13</h6>
                                    <p class="fs-12 text-muted mb-0">Pelanggaran</p>
                                </div>
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder">80</h6>
                                    <p class="fs-12 text-muted mb-0">Prestasi</p>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i>Sekolah</span>
                                <a href="javascript:void(0);" class="float-end">SMK Telkom Purwokerto</a>
                            </li>
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-star"></i>Jumlah Bintang</span>
                                <a href="javascript:void(0);" class="float-end">3</a>
                            </li>
                            <li class="hstack justify-content-between mb-0">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i>Email</span>
                                <a href="javascript:void(0);" class="float-end">alex.della@outlook.com</a>
                            </li>
                        </ul>
                        <div class="d-flex gap-2 text-center pt-4">
                            <a href="javascript:void(0);" class="w-50 btn btn-light-brand">
                                <i class="feather-trash-2 me-2"></i>
                                <span>Delete</span>
                            </a>
                            <a href="javascript:void(0);" class="w-50 btn btn-primary">
                                <i class="feather-edit me-2"></i>
                                <span>Edit Profile</span>
                            </a>
                        </div>
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
                            <div class="about-section mb-5">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Profile About:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Updates</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia repudiandae, tenetur voluptas maiores unde veniam deleniti atque omnis sed temporibus necessitatibus, iste non dolores sit eaque hic laboriosam molestias? Dolores!</p>
                            </div>
                            <div class="profile-details mb-5">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">Profile Details:</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Edit Profile</a>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Full Name:</div>
                                    <div class="col-sm-6 fw-semibold">Alexandra Della</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Email Address:</div>
                                    <div class="col-sm-6 fw-semibold">alex.della@outlook.com</div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-sm-6 text-muted">Sekolah :</div>
                                    <div class="col-sm-6 fw-semibold">SMK Telkom Purwokerto</div>
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
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View Alls</a>
                                </div>
                                <ul class="list-unstyled activity-feed">
                                    <li class="d-flex justify-content-between feed-item feed-item-success">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">Reynante placed new order <span class="date">[April 19, 2023]</span></span>
                                            <span class="text">New order placed <a href="javascript:void(0);" class="fw-bold text-primary">#456987</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-info">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">5+ friends join this group <span class="date">[April 20, 2023]</span></span>
                                            <span class="text">Joined the group <a href="javascript:void(0);" class="fw-bold text-primary">"Duralux"</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-secondary">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">Socrates send you friend request <span class="date">[April 21, 2023]</span></span>
                                            <span class="text">New friend request <a href="javascript:void(0);" class="badge bg-soft-success text-success ms-1">Conform</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-warning">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">Reynante make deposit $565 USD <span class="date">[April 22, 2023]</span></span>
                                            <span class="text">Make deposit <a href="javascript:void(0);" class="fw-bold text-primary">$565 USD</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-primary">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">New event are coming soon <span class="date">[April 23, 2023]</span></span>
                                            <span class="text">Attending the event <a href="javascript:void(0);" class="fw-bold text-primary">"Duralux Event"</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-info">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">5+ friends join this group <span class="date">[April 20, 2023]</span></span>
                                            <span class="text">Joined the group <a href="javascript:void(0);" class="fw-bold text-primary">"Duralux"</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-danger">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">New meeting joining are pending <span class="date">[April 23, 2023]</span></span>
                                            <span class="text">Duralux meeting <a href="javascript:void(0);" class="badge bg-soft-warning text-warning ms-1">Join</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-info">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">5+ friends join this group <span class="date">[April 20, 2023]</span></span>
                                            <span class="text">Joined the group <a href="javascript:void(0);" class="fw-bold text-primary">"Duralux"</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-secondary">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">Socrates send you friend request <span class="date">[April 21, 2023]</span></span>
                                            <span class="text">New friend request <a href="javascript:void(0);" class="badge bg-soft-success text-success ms-1">Conform</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-warning">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">Reynante make deposit $565 USD <span class="date">[April 22, 2023]</span></span>
                                            <span class="text">Make deposit <a href="javascript:void(0);" class="fw-bold text-primary">$565 USD</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between feed-item feed-item-primary">
                                        <div>
                                            <span class="text-truncate-1-line lead_date">New event are coming soon <span class="date">[April 23, 2023]</span></span>
                                            <span class="text">Attending the event <a href="javascript:void(0);" class="fw-bold text-primary">"Duralux Event"</a></span>
                                        </div>
                                        <div class="ms-3 d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Make Read"><i class="feather feather-check fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View Activity"><i class="feather feather-eye fs-12"></i></a>
                                            <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <a href="javascript:void(0);" class="d-flex align-items-center text-muted">
                                    <i class="feather feather-more-horizontal fs-12"></i>
                                    <span class="fs-10 text-uppercase ms-2 text-truncate-1-line">Load More</span>
                                </a>
                            </div>
                            <hr>
                            <div class="logs-history mb-0">
                                <div class="px-4 mb-4 d-flex justify-content-between">
                                    <h5 class="fw-bold">Logs History</h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View Alls</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-dark text-center border-top">
                                            <tr>
                                                <th class="text-start ps-4">Browser</th>
                                                <th>IP</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Chrome on Window</td>
                                                <td><span class="text-muted">192.149.122.128</span></td>
                                                <td>
                                                    <span class="text-muted"> <span class="d-none d-sm-inline-block">11:34 PM</span></span>
                                                </td>
                                                <td><i class="feather feather-check-circle text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Mozilla on Window</td>
                                                <td><span class="text-muted">186.188.154.225</span></td>
                                                <td>
                                                    <span class="text-muted">Nov 20, 2023 <span class="d-none d-sm-inline-block">10:34 PM</span></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><i class="feather feather-x text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Chrome on iMac</td>
                                                <td><span class="text-muted">192.149.122.128</span></td>
                                                <td>
                                                    <span class="text-muted">Oct 23, 2023 <span class="d-none d-sm-inline-block">04:16 PM</span></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><i class="feather feather-x text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Mozilla on Window</td>
                                                <td><span class="text-muted">186.188.154.225</span></td>
                                                <td>
                                                    <span class="text-muted">Nov 20, 2023 <span class="d-none d-sm-inline-block">10:34 PM</span></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><i class="feather feather-x text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Chrome on Window</td>
                                                <td><span class="text-muted">192.149.122.128</span></td>
                                                <td>
                                                    <span class="text-muted">Oct 23, 2023 <span class="d-none d-sm-inline-block">04:16 PM</span></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><i class="feather feather-x text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Chrome on iMac</td>
                                                <td><span class="text-muted">192.149.122.128</span></td>
                                                <td>
                                                    <span class="text-muted">Oct 15, 2023 <span class="d-none d-sm-inline-block">11:41 PM</span></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><i class="feather feather-x text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Mozilla on Window</td>
                                                <td><span class="text-muted">186.188.154.225</span></td>
                                                <td>
                                                    <span class="text-muted">Oct 13, 2023 <span class="d-none d-sm-inline-block">05:43 AM</span></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><i class="feather feather-x text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-medium text-dark text-start ps-4">Chrome on iMac</td>
                                                <td><span class="text-muted">192.149.122.128</span></td>
                                                <td>
                                                    <span class="text-muted">Oct 03, 2023 <span class="d-none d-sm-inline-block">04:12 AM</span></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><i class="feather feather-x text-danger"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
