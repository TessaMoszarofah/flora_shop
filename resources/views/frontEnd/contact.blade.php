<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flora Shop</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/logoflora1.png" type="image/png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

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
    <link rel="stylesheet" href="{{asset('frontAsset/css/style.css')}}">
</head>
<body class="goto-here">

    {{-- awal navbar --}}
    @include('layouts.frontend.navbar')
    {{-- akhir navbar --}}

    <div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/background.jpg')}}');" id="content-contact">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Contact us</span></p>
                    <h1 class="mb-0 bread">Contact us</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex" id="contact-alamat">
                    <div class="info bg-white p-4">
                        <p><span>Address:</span> 2204 Jl Indah, Bandung, Jawa Barat, Indonesia </p>
                    </div>
                </div>
                <div class="col-md-3 d-flex" id="contact-number">
                    <div class="info bg-white p-4">
                        <p><span>Phone:</span> <a href="tel://1234567920">+62 123 4567 891</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex" id="contact-email">
                    <div class="info bg-white p-4">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">tessamoszarofah@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex" id="contact-website">
                    <div class="info bg-white p-4">
                        <p><span>Website</span> <a href="#">florashop.com</a></p>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('send.contact') }}" method="POST" class="bg-white p-5 contact-form" id="contact-form1">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <input t ype="text" class="form-control" placeholder="Your Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" id="send-message">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    {{-- <div id="map" class="bg-white">
              <script>
                var map = L.map('map').setView([51.505, -0.09], 13);
        
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
              </script>
            </div> --}}
                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3611570487465!2d107.58974617412481!3d-6.96665166821101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8deccecb6f1%3A0x658cc60fbe5017b9!2sSMK%20Assalaam%20Bandung%20(PUSAT%20KEUNGGULAN)!5e0!3m2!1sid!2sid!4v1730014352237!5m2!1sid!2sid" width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    {{-- <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.670088759567!2d107.6353539!3d-6.9299792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8770a118df1%3A0x8b514e8ec8587e4f!2sM.A%20Flora!5e0!3m2!1sen!2sid!4v1736133700887!5m2!1sen!2sid" width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                </div>
            </div>
        </div>
    </section>

    {{-- awal footer --}}
    @include('layouts.frontend.footer')
    {{-- akhir footer --}}



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

    {{-- <script>
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch('{{ route('
                    sendMessage ')}}', {
    method: 'POST'
    , headers: {
    'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
    , body: formData
    })
    .then(response => response.text()) // Ubah dari .json() ke .text() untuk debugging
    .then(data => {
    console.log(data); // Cek isi data
    let jsonData;
    try {
    jsonData = JSON.parse(data); // Parsing manual setelah memastikan respons benar
    } catch (error) {
    console.error('JSON parsing error:', error);
    return; // Keluar dari fungsi jika parsing gagal
    }
    if (jsonData.success) {
    alert('Message sent successfully.');
    document.getElementById('contact-form').reset();
    } else {
    alert('There was an error sending the message.');
    }
    }))
    .catch(error => console.error('Error:', error));
    });

    </script> --}}


</body>
</html>
