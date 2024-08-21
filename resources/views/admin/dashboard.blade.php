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
                                        <i class="feather-user-x"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            <span class="counter">0</span>
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Pelanggar</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
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
                                        <i class="feather-bar-chart"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            <span class="counter">504</span>
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Ranking Poin</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
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
                                        <i class="feather-book"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            <span class="counter">101</span>
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Pasal</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
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
                                        <i class="feather-download"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            <span class="counter">504</span>
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Siswa Belum Install</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- [Conversion Rate] end -->
                <!-- [Payment Records] start -->
              
                <!-- [Payment Records] end -->
                <!-- [Total Sales] start -->
              
                <!-- [Total Sales] end !-->
                <!-- [Mini] start -->
                
                
                
                <!-- [Mini] end !-->
                <!-- [Leads Overview] start -->
               
                <!-- [Leads Overview] end -->
                <!-- [Latest Leads] start -->

                <!-- [Latest Leads] end -->
                <!--! BEGIN: [Upcoming Schedule] !-->
               
                <!--! END: [Upcoming Schedule] !-->
                <!--! BEGIN: [Project Status] !-->
              
                <!--! END: [Project Status] !-->
                <!--! BEGIN: [Team Progress] !-->
               
                <!--! END: [Team Progress] !-->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
