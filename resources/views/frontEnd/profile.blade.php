<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flora Shop</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/logoflora1.png" type="image/png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    {{-- CSS Utama --}}
    <link rel="stylesheet" href="{{asset('frontAsset/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontAsset/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('frontAsset/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontAsset/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontAsset/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontAsset/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontAsset/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontAsset/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontAsset/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('frontAsset/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontAsset/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('frontAsset/css/style.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .menu-link {
            text-decoration: none;
            color: black;
            font-weight: 500;
            display: block;
            padding: 5px 0;
        }

        .menu-link:hover {
            color: green;
        }

        .menu-link.active {
            color: green;
        }

        input[type="text"],
        input[type="email"] {
            font-size: 14px;
            /* Mengecilkan ukuran teks */
            width: 100%;
            /* Membuat input lebih lebar */
            padding: 8px;
            /* Memberikan sedikit ruang di dalam input */
        }

    </style>
</head>
<body class="goto-here">

    <!-- Navbar -->
    @include('layouts.frontend.navbar')
    <div class="bg-light">
        <section class="container py-5 ">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 mb-4 p-3 bg-white rounded shadow-sm me-4">
                    <h2 class="h5 mb-4 fw-bold"><i class="fas fa-user-circle me-2"></i> Akun Saya</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="menu-link"><i class="fas fa-user" style="color: #2d6a4f;"></i> Profil</a></li>
                        <li><a href="#" class="menu-link"><i class="fas fa-map-marker-alt" style="color: #7a9e92;"></i> Alamat</a></li>
                        <li><a href="#" class="menu-link"><i class="fas fa-lock" style="color: #d8b58c;"></i> Ubah Password</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="#" class="menu-link"><i class="fas fa-box" style="color: #7b9e7e;"></i> Pesanan Saya</a></li>
                        <li><a href="#" class="menu-link"><i class="fas fa-history" style="color: #7a9f76;"></i> Riwayat Pesanan</a></li>
                        <li><a href="{{url('/kontak')}}" class="menu-link"><i class="fas fa-headset" style="color: #9eaf94;"></i> Bantuan & Dukungan</a></li>
                    </ul>
                </div>

                <!-- Form Profil -->
                <div class="col-md-8 mb-4 p-4 bg-white rounded shadow-sm ps-4">
                    <h2 class="h5 mb-3 fw-bold">Profil Saya</h2>
                    <p class="text-muted">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-user me-2"></i>Username</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
                            <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-calendar-alt me-2"></i>Tanggal Lahir</label>
                            <input type="date" name="birthdate" class="form-control" value="{{ auth()->user()->birthdate }}">
                        </div>
                        <button type="submit" class="btn" style="background-color: #4CAF50; color: white;"><i class="fas fa-save me-2"></i>Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>


    <!-- Footer -->
    @include('layouts.frontend.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


    <script src="{{asset('frontAsset/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/popper.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('frontAsset/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/aos.js')}}"></script>
    <script src="{{asset('frontAsset/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('frontAsset/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('frontAsset/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('frontAsset/js/google-map.js')}}"></script>
    <script src="{{asset('frontAsset/js/main.js')}}"></script>


    <script>
        document.querySelectorAll('.menu-link').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.menu-link').forEach(link => link.classList.remove('active'));
                this.classList.add('active');
            });
        });

    </script>
</body>
</html>
