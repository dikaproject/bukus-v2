<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa - Bukusaku v2</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <style>
        body {
            background-color: red;
        }
    </style>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-100 bg-white p-2 rounded shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('assets/images/smktelkompwt-logo.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Login Siswa</h2>
                        <h4 class="fs-13 fw-bold mb-2">Login to Bukusaku v2</h4>
                        <p class="fs-12 fw-medium text-muted">BUKU SAKU SMK TELKOM PURWOKERTO</p>
                        <form action="{{ route('student_login_submit') }}" method="POST" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="mb-4">
                                <input type="text" class="form-control" name="nis" placeholder="Masukan Nis"  required autofocus>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-danger w-100">Login</button>
                        </form>
                        <div class="mt-5 text-muted">
                            <span>Tidak Bisa Login? Silahkan hubungi Wali Kelas!!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
</body>
</html>
