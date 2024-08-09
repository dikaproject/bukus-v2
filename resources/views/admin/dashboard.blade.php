@extends('admin.components.base')

@section('title', 'dashboard')

@section('dashboard')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
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
                        <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                            <span class="reportrange-picker-field"></span>
                        </div>
                        <div class="dropdown filter-dropdown">
                            <a class="btn btn-md btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                data-bs-auto-close="outside">
                                <i class="feather-filter me-2"></i>
                                <span>Filter</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Role"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Role">Role</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Team"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Team">Team</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Email"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Email">Email</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Member"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Member">Member</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Recommendation"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer"
                                            for="Recommendation">Recommendation</label>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-plus me-3"></i>
                                    <span>Create New</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-filter me-3"></i>
                                    <span>Manage Filter</span>
                                </a>
                            </div>
                        </div>
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
                <!-- [Invoices Awaiting Payment] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="feather-dollar-sign"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">45</span>/<span
                                                class="counter">76</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Invoices Awaiting Payment</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);"
                                        class="fs-12 fw-medium text-muted text-truncate-1-line">Invoices Awaiting </a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">$5,569</span>
                                        <span class="fs-11 text-muted">(56%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 56%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Invoices Awaiting Payment] end -->
                <!-- [Converted Leads] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="feather-cast"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">48</span>/<span
                                                class="counter">86</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Converted Leads</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);"
                                        class="fs-12 fw-medium text-muted text-truncate-1-line">Converted Leads </a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">52 Completed</span>
                                        <span class="fs-11 text-muted">(63%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 63%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Converted Leads] end -->
                <!-- [Projects In Progress] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="feather-briefcase"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">16</span>/<span
                                                class="counter">20</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Projects In Progress</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);"
                                        class="fs-12 fw-medium text-muted text-truncate-1-line">Projects In Progress </a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">16 Completed</span>
                                        <span class="fs-11 text-muted">(78%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 78%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Projects In Progress] end -->
                <!-- [Conversion Rate] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="feather-activity"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">46.59</span>%</div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Conversion Rate</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">
                                        Conversion Rate </a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">$2,254</span>
                                        <span class="fs-11 text-muted">(46%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 46%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Conversion Rate] end -->
                <!-- [Payment Records] start -->
                <div class="col-xxl-8">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Payment Record</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                            data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                            data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                            data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                        data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action p-0">
                            <div id="payment-records-chart"></div>
                        </div>
                        <div class="card-footer">
                            <div class="row g-4">
                                <div class="col-lg-3">
                                    <div class="p-3 border border-dashed rounded">
                                        <div class="fs-12 text-muted mb-1">Awaiting</div>
                                        <h6 class="fw-bold text-dark">$5,486</h6>
                                        <div class="progress mt-2 ht-3">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 81%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="p-3 border border-dashed rounded">
                                        <div class="fs-12 text-muted mb-1">Completed</div>
                                        <h6 class="fw-bold text-dark">$9,275</h6>
                                        <div class="progress mt-2 ht-3">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 82%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="p-3 border border-dashed rounded">
                                        <div class="fs-12 text-muted mb-1">Rejected</div>
                                        <h6 class="fw-bold text-dark">$3,868</h6>
                                        <div class="progress mt-2 ht-3">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 68%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="p-3 border border-dashed rounded">
                                        <div class="fs-12 text-muted mb-1">Revenue</div>
                                        <h6 class="fw-bold text-dark">$50,668</h6>
                                        <div class="progress mt-2 ht-3">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: 75%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Payment Records] end -->
                <!-- [Total Sales] start -->
                <div class="col-xxl-4">
                    <div class="card stretch stretch-full overflow-hidden">
                        <div class="bg-primary text-white">
                            <div class="p-4">
                                <span class="badge bg-light text-primary text-dark float-end">12%</span>
                                <div class="text-start">
                                    <h4 class="text-reset">30,569</h4>
                                    <p class="text-reset m-0">Total Sales</p>
                                </div>
                            </div>
                            <div id="total-sales-color-graph"></div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="hstack gap-3">
                                    <div class="avatar-image avatar-lg p-2 rounded">
                                        <img class="img-fluid" src="assets/images/brand/shopify.png" alt="" />
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="d-block">Shopify eCommerce Store</a>
                                        <span class="fs-12 text-muted">Development</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">$1200</div>
                                    <div class="fs-12 text-end">6 Projects</div>
                                </div>
                            </div>
                            <hr class="border-dashed my-3" />
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="hstack gap-3">
                                    <div class="avatar-image avatar-lg p-2 rounded">
                                        <img class="img-fluid" src="assets/images/brand/app-store.png" alt="" />
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="d-block">iOS Apps Development</a>
                                        <span class="fs-12 text-muted">Development</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">$1450</div>
                                    <div class="fs-12 text-end">3 Projects</div>
                                </div>
                            </div>
                            <hr class="border-dashed my-3" />
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="hstack gap-3">
                                    <div class="avatar-image avatar-lg p-2 rounded">
                                        <img class="img-fluid" src="assets/images/brand/figma.png" alt="" />
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="d-block">Figma Dashboard Design</a>
                                        <span class="fs-12 text-muted">UI/UX Design</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">$1250</div>
                                    <div class="fs-12 text-end">5 Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);"
                            class="card-footer fs-11 fw-bold text-uppercase text-center py-4">Full Details</a>
                    </div>
                </div>
                <!-- [Total Sales] end !-->
                <!-- [Mini] start -->
                <div class="col-lg-4">
                    <div class="card mb-4 stretch stretch-full">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="avatar-text">
                                    <i class="feather feather-star"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">Tasks Completed</div>
                                    <div class="fs-12 text-muted">22/35 completed</div>
                                </div>
                            </div>
                            <div class="fs-4 fw-bold text-dark">22/35</div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-between gap-4">
                            <div id="task-completed-area-chart"></div>
                            <div class="fs-12 text-muted text-nowrap">
                                <span class="fw-semibold text-primary">28% more</span><br />
                                <span>from last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 stretch stretch-full">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="avatar-text">
                                    <i class="feather feather-file-text"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">New Tasks</div>
                                    <div class="fs-12 text-muted">0/20 tasks</div>
                                </div>
                            </div>
                            <div class="fs-4 fw-bold text-dark">5/20</div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-between gap-4">
                            <div id="new-tasks-area-chart"></div>
                            <div class="fs-12 text-muted text-nowrap">
                                <span class="fw-semibold text-success">34% more</span><br />
                                <span>from last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 stretch stretch-full">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="avatar-text">
                                    <i class="feather feather-airplay"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">Project Done</div>
                                    <div class="fs-12 text-muted">20/30 project</div>
                                </div>
                            </div>
                            <div class="fs-4 fw-bold text-dark">20/30</div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-between gap-4">
                            <div id="project-done-area-chart"></div>
                            <div class="fs-12 text-muted text-nowrap">
                                <span class="fw-semibold text-danger">42% more</span><br />
                                <span>from last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Mini] end !-->
                <!-- [Leads Overview] start -->
                <div class="col-xxl-4">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Leads Overview</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                            data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                            data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                            data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                        data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action">
                            <div id="leads-overview-donut"></div>
                            <div class="row g-2">
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #3454d1"></span>
                                        <span>New<span class="fs-10 text-muted ms-1">(20K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #0d519e"></span>
                                        <span>Contacted<span class="fs-10 text-muted ms-1">(15K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #1976d2"></span>
                                        <span>Qualified<span class="fs-10 text-muted ms-1">(10K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #1e88e5"></span>
                                        <span>Working<span class="fs-10 text-muted ms-1">(18K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #2196f3"></span>
                                        <span>Customer<span class="fs-10 text-muted ms-1">(10K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #42a5f5"></span>
                                        <span>Proposal<span class="fs-10 text-muted ms-1">(15K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #64b5f6"></span>
                                        <span>Leads<span class="fs-10 text-muted ms-1">(16K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #90caf9"></span>
                                        <span>Progress<span class="fs-10 text-muted ms-1">(14K)</span></span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);"
                                        class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                        <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                            style="background-color: #aad6fa"></span>
                                        <span>Others<span class="fs-10 text-muted ms-1">(10K)</span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Leads Overview] end -->
                <!-- [Latest Leads] start -->
                <div class="col-xxl-8">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Latest Leads</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                            data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                            data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                            data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                        data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="border-b">
                                            <th scope="row">Users</th>
                                            <th>Proposal</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="avatar-image">
                                                        <img src="assets/images/avatar/2.png" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <a href="javascript:void(0);">
                                                        <span class="d-block">Archie Cantones</span>
                                                        <span
                                                            class="fs-12 d-block fw-normal text-muted">arcie.tones@gmail.com</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-gray-200 text-dark">Sent</span>
                                            </td>
                                            <td>11/06/2023 10:53</td>
                                            <td>
                                                <span class="badge bg-soft-success text-success">Completed</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="avatar-image">
                                                        <img src="assets/images/avatar/3.png" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <a href="javascript:void(0);">
                                                        <span class="d-block">Holmes Cherryman</span>
                                                        <span
                                                            class="fs-12 d-block fw-normal text-muted">golms.chan@gmail.com</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-gray-200 text-dark">New</span>
                                            </td>
                                            <td>11/06/2023 10:53</td>
                                            <td>
                                                <span class="badge bg-soft-primary text-primary">In Progress </span>
                                            </td>
                                            <td class="text-end">
                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="avatar-image">
                                                        <img src="assets/images/avatar/4.png" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <a href="javascript:void(0);">
                                                        <span class="d-block">Malanie Hanvey</span>
                                                        <span
                                                            class="fs-12 d-block fw-normal text-muted">lanie.nveyn@gmail.com</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-gray-200 text-dark">Sent</span>
                                            </td>
                                            <td>11/06/2023 10:53</td>
                                            <td>
                                                <span class="badge bg-soft-success text-success">Completed</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="avatar-image">
                                                        <img src="assets/images/avatar/5.png" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <a href="javascript:void(0);">
                                                        <span class="d-block">Kenneth Hune</span>
                                                        <span
                                                            class="fs-12 d-block fw-normal text-muted">nneth.une@gmail.com</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-gray-200 text-dark">Returning</span>
                                            </td>
                                            <td>11/06/2023 10:53</td>
                                            <td>
                                                <span class="badge bg-soft-warning text-warning">Not Interested</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="avatar-image">
                                                        <img src="assets/images/avatar/6.png" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <a href="javascript:void(0);">
                                                        <span class="d-block">Valentine Maton</span>
                                                        <span
                                                            class="fs-12 d-block fw-normal text-muted">alenine.aton@gmail.com</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-gray-200 text-dark">Sent</span>
                                            </td>
                                            <td>11/06/2023 10:53</td>
                                            <td>
                                                <span class="badge bg-soft-success text-success">Completed</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                                <li>
                                    <a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a>
                                </li>
                                <li><a href="javascript:void(0);" class="active">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li>
                                    <a href="javascript:void(0);"><i class="bi bi-dot"></i></a>
                                </li>
                                <li><a href="javascript:void(0);">8</a></li>
                                <li><a href="javascript:void(0);">9</a></li>
                                <li>
                                    <a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- [Latest Leads] end -->
                <!--! BEGIN: [Upcoming Schedule] !-->
                <div class="col-xxl-4">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Upcoming Schedule</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                            data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                            data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                            data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                        data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--! BEGIN: [Events] !-->
                            <div class="p-3 border border-dashed rounded-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="wd-50 ht-50 bg-soft-primary text-primary lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
                                            <span class="fs-18 fw-bold mb-1 d-block">20</span>
                                            <span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
                                        </div>
                                        <div class="text-dark">
                                            <a href="javascript:void(0);" class="fw-bold mb-2 text-truncate-1-line">React
                                                Dashboard Design</a>
                                            <span class="fs-11 fw-normal text-muted text-truncate-1-line">11:30am -
                                                12:30pm</span>
                                        </div>
                                    </div>
                                    <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Janette Dalton">
                                            <img src="assets/images/avatar/2.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Michael Ksen">
                                            <img src="assets/images/avatar/3.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Socrates Itumay">
                                            <img src="assets/images/avatar/4.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                            <img src="assets/images/avatar/6.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-text avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Explorer More">
                                            <i class="feather-more-horizontal"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--! BEGIN: [Events] !-->
                            <div class="p-3 border border-dashed rounded-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="wd-50 ht-50 bg-soft-warning text-warning lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
                                            <span class="fs-18 fw-bold mb-1 d-block">30</span>
                                            <span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
                                        </div>
                                        <div class="text-dark">
                                            <a href="javascript:void(0);" class="fw-bold mb-2 text-truncate-1-line">Admin
                                                Design Concept</a>
                                            <span class="fs-11 fw-normal text-muted text-truncate-1-line">10:00am -
                                                12:00pm</span>
                                        </div>
                                    </div>
                                    <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Janette Dalton">
                                            <img src="assets/images/avatar/2.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Michael Ksen">
                                            <img src="assets/images/avatar/3.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                            <img src="assets/images/avatar/5.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                            <img src="assets/images/avatar/6.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-text avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Explorer More">
                                            <i class="feather-more-horizontal"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--! BEGIN: [Events] !-->
                            <div class="p-3 border border-dashed rounded-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="wd-50 ht-50 bg-soft-success text-success lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
                                            <span class="fs-18 fw-bold mb-1 d-block">17</span>
                                            <span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
                                        </div>
                                        <div class="text-dark">
                                            <a href="javascript:void(0);"
                                                class="fw-bold mb-2 text-truncate-1-line">Standup Team Meeting</a>
                                            <span class="fs-11 fw-normal text-muted text-truncate-1-line">8:00am -
                                                9:00am</span>
                                        </div>
                                    </div>
                                    <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Janette Dalton">
                                            <img src="assets/images/avatar/2.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Michael Ksen">
                                            <img src="assets/images/avatar/3.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Socrates Itumay">
                                            <img src="assets/images/avatar/4.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                            <img src="assets/images/avatar/5.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-text avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Explorer More">
                                            <i class="feather-more-horizontal"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--! BEGIN: [Events] !-->
                            <div class="p-3 border border-dashed rounded-3 mb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="wd-50 ht-50 bg-soft-danger text-danger lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
                                            <span class="fs-18 fw-bold mb-1 d-block">25</span>
                                            <span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
                                        </div>
                                        <div class="text-dark">
                                            <a href="javascript:void(0);" class="fw-bold mb-2 text-truncate-1-line">Zoom
                                                Team Meeting</a>
                                            <span class="fs-11 fw-normal text-muted text-truncate-1-line">03:30pm -
                                                05:30pm</span>
                                        </div>
                                    </div>
                                    <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Janette Dalton">
                                            <img src="assets/images/avatar/2.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Socrates Itumay">
                                            <img src="assets/images/avatar/4.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                            <img src="assets/images/avatar/5.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Marianne Audrey">
                                            <img src="assets/images/avatar/6.png" class="img-fluid" alt="image" />
                                        </a>
                                        <a href="javascript:void(0)" class="avatar-text avatar-md"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title="Explorer More">
                                            <i class="feather-more-horizontal"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);"
                            class="card-footer fs-11 fw-bold text-uppercase text-center py-4">Upcomming Schedule</a>
                    </div>
                </div>
                <!--! END: [Upcoming Schedule] !-->
                <!--! BEGIN: [Project Status] !-->
                <div class="col-xxl-4">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Project Status</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                            data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                            data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                            data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                        data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action">
                            <div class="mb-3">
                                <div class="mb-4 pb-1 d-flex">
                                    <div class="d-flex w-50 align-items-center me-3">
                                        <img src="assets/images/brand/app-store.png" alt="laravel-logo" class="me-3"
                                            width="35" />
                                        <div>
                                            <a href="javascript:void(0);" class="text-truncate-1-line">Apps
                                                Development</a>
                                            <div class="fs-11 text-muted">Applications</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="progress w-100 me-3 ht-5">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 54%"
                                                aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-muted">54%</span>
                                    </div>
                                </div>
                                <hr class="border-dashed my-3" />
                                <div class="mb-4 pb-1 d-flex">
                                    <div class="d-flex w-50 align-items-center me-3">
                                        <img src="assets/images/brand/figma.png" alt="figma-logo" class="me-3"
                                            width="35" />
                                        <div>
                                            <a href="javascript:void(0);" class="text-truncate-1-line">Dashboard
                                                Design</a>
                                            <div class="fs-11 text-muted">App UI Kit</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="progress w-100 me-3 ht-5">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 86%"
                                                aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-muted">86%</span>
                                    </div>
                                </div>
                                <hr class="border-dashed my-3" />
                                <div class="mb-4 pb-1 d-flex">
                                    <div class="d-flex w-50 align-items-center me-3">
                                        <img src="assets/images/brand/facebook.png" alt="vue-logo" class="me-3"
                                            width="35" />
                                        <div>
                                            <a href="javascript:void(0);" class="text-truncate-1-line">Facebook
                                                Marketing</a>
                                            <div class="fs-11 text-muted">Marketing</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="progress w-100 me-3 ht-5">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-muted">90%</span>
                                    </div>
                                </div>
                                <hr class="border-dashed my-3" />
                                <div class="mb-4 pb-1 d-flex">
                                    <div class="d-flex w-50 align-items-center me-3">
                                        <img src="assets/images/brand/github.png" alt="react-logo" class="me-3"
                                            width="35" />
                                        <div>
                                            <a href="javascript:void(0);" class="text-truncate-1-line">React Dashboard
                                                Github</a>
                                            <div class="fs-11 text-muted">Dashboard</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="progress w-100 me-3 ht-5">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 37%"
                                                aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-muted">37%</span>
                                    </div>
                                </div>
                                <hr class="border-dashed my-3" />
                                <div class="d-flex">
                                    <div class="d-flex w-50 align-items-center me-3">
                                        <img src="assets/images/brand/paypal.png" alt="sketch-logo" class="me-3"
                                            width="35" />
                                        <div>
                                            <a href="javascript:void(0);" class="text-truncate-1-line">Paypal Payment
                                                Gateway</a>
                                            <div class="fs-11 text-muted">Payment</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="progress w-100 me-3 ht-5">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 29%"
                                                aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-muted">29%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);"
                            class="card-footer fs-11 fw-bold text-uppercase text-center">Upcomming Projects</a>
                    </div>
                </div>
                <!--! END: [Project Status] !-->
                <!--! BEGIN: [Team Progress] !-->
                <div class="col-xxl-4">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Team Progress</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                            data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                            data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                            data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm"
                                        data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action">
                            <div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-3">
                                <div class="hstack gap-3">
                                    <div class="avatar-image">
                                        <img src="assets/images/avatar/1.png" alt="" class="img-fluid" />
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);">Alexandra Della</a>
                                        <div class="fs-11 text-muted">Frontend Developer</div>
                                    </div>
                                </div>
                                <div class="team-progress-1"></div>
                            </div>
                            <div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-3">
                                <div class="hstack gap-3">
                                    <div class="avatar-image">
                                        <img src="assets/images/avatar/2.png" alt="" class="img-fluid" />
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);">Archie Cantones</a>
                                        <div class="fs-11 text-muted">UI/UX Designer</div>
                                    </div>
                                </div>
                                <div class="team-progress-2"></div>
                            </div>
                            <div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-3">
                                <div class="hstack gap-3">
                                    <div class="avatar-image">
                                        <img src="assets/images/avatar/3.png" alt="" class="img-fluid" />
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);">Malanie Hanvey</a>
                                        <div class="fs-11 text-muted">Backend Developer</div>
                                    </div>
                                </div>
                                <div class="team-progress-3"></div>
                            </div>
                            <div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-2">
                                <div class="hstack gap-3">
                                    <div class="avatar-image">
                                        <img src="assets/images/avatar/4.png" alt="" class="img-fluid" />
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);">Kenneth Hune</a>
                                        <div class="fs-11 text-muted">Digital Marketer</div>
                                    </div>
                                </div>
                                <div class="team-progress-4"></div>
                            </div>
                        </div>
                        <a href="javascript:void(0);"
                            class="card-footer fs-11 fw-bold text-uppercase text-center">Update 30 Min Ago</a>
                    </div>
                </div>
                <!--! END: [Team Progress] !-->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
