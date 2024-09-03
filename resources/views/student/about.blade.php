@extends('student.components.base')

@section('title', 'about')

@section('dashboard')
<div class="auth-minimal-inner">
    <div class="minimal-card-wrapper">
        <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
            <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                <img src="assets/images/logo-abbr.png" alt="" class="img-fluid">
            </div>
            <div class="card-body p-sm-5">
                <h2 class="fs-20 fw-bolder mb-4">Maintenance</h2>
                <h4 class="fs-13 fw-bold mb-2">Now we are under maintenance</h4>
                <p class="fs-12 fw-medium text-muted">Sorry for the inconvenience but we're performing some maintenance at the moment.</p>
                <form action="#" class="w-100 mt-4 pt-2">
                    <div class="mb-4">
                        <input type="email" class="form-control" placeholder="Enter Your Email" required>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-lg btn-primary w-100">Notify Me</button>
                    </div>
                </form>
                <div class="mt-5 d-flex justify-content-center gap-2">
                    <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Follow on Facebook">
                        <i class="feather-facebook"></i>
                    </a>
                    <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Follow on Twitter">
                        <i class="feather-twitter"></i>
                    </a>
                    <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Follow on Instagram">
                        <i class="feather-instagram"></i>
                    </a>
                    <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Follow on Github">
                        <i class="feather-github"></i>
                    </a>
                    <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Follow on Linkedin">
                        <i class="feather-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
