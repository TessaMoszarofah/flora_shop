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
    <style>
        .checkout-btn {
            background-color: #8CBF4D; /* Warna hijau */
            color: white !important; /* Paksa warna teks menjadi putih */
            font-size: 16px;
            font-weight: bold; /* Agar teks lebih tegas */
            border: none;
            padding: 10px 30px; /* Tambah padding supaya lebih lebar */
            border-radius: 20px; /* Membuat sudut membulat */
            outline: none;
            cursor: pointer;
            box-shadow: 0 0 5px #ADD8E6; /* Efek bayangan biru muda */
            transition: 0.3s;
            border: 2px solid #8CBF4D; /* Border hijau */
            display: inline-block; /* Pastikan tidak mengecil */
            min-width: 120px; /* Lebar minimal tombol */
            text-align: center; /* Agar teks rata tengah */
        }

        .checkout-btn:hover {
            background-color: white; /* Warna putih saat hover */
            color: #8CBF4D !important; /* Warna teks hijau saat hover */
            border: 2px solid #8CBF4D; /* Border tetap hijau */
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.JSV a').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();
                    var formId = this.dataset.formId;
                    console.log("Submitting form ID: " + formId);
                    document.getElementById(formId).submit();
                });
            });
        });

    </script>
</head>
<body class="goto-here">

    {{-- awal navbar --}}
    @include('layouts.frontend.navbar')
    {{-- akhir navbar --}}

    <div class="hero-wrap hero-bread" style="background-image: url({{asset('images/background.jpg')}});" id="content-cart">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('cart.select')}}" method="post" class="JSVV">
        @csrf
        <section class="ftco-section ftco-cart" id="data-Cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Product name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($cartItems->isEmpty())
                                    <tr>
                                        <td colspan="6" class="justify-content-center align-items-center text-center"> <b>cart kosong</b></td>
                                    </tr>
                                    @endif
                                    @foreach($cartItems as $item)

                                    <tr class="text-center">
                                        <td class="product-remove">
                                            <form action="{{ route('cart.remove', $item->id) }}" method="post" id="myForm-{{$item->id}}" class="JSV">
                                                @csrf
                                                <a href="javascript:void(0);" class="JSV" data-form-id="myForm-{{ $item->id }}"><span class="ion-ios-close" onclick="submitForm()"></span></a>
                                                {{-- <a type="submit" href="{{ route('cart.remove', $item->id) }}"><span class="ion-ios-close"></span></a> --}}
                                            </form>
                                        </td>

                                        <td class="image-prod">
                                            <div class="img" style="background-image:url({{asset('images/produk/'. $item->produk->gambar)}});"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{$item->produk->nama_produk}}</h3>
                                            <p></p>
                                        </td>

                                        <td class="price">Rp. {{number_format($item->produk->harga)}}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <form action="{{ route('cart.update', $item->id) }}" method="post">
                                                    @csrf
                                                    <input type="text" name="quantity" class="quantity form-control input-number" value="{{$item->quantity}}" min="1" max="100">
                                                    <button type="submit" hidden></button>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="total">Rp. {{ number_format($item->produk->harga * $item->quantity) }}</td>
                                        <td class="product-select">
                                            <input type="checkbox" name="checked_items[]" value="{{ $item->id }}" class="item-checkbox" {{ $item->is_selected ? 'checked' : '' }}>
                                        </td>
                                    </tr><!-- END TR-->
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Tambahkan button checkout di bawah tabel -->
                            @if(!$cartItems->isEmpty())
                            <div class="text-right mt-3">
                                {{-- <button type="submit" id="order" class="btn btn-primary">Checkout</button> --}}
                                <a href="javascript:void(0);" id="order" class="btn btn-primary">Checkout</a>
                                {{-- <button type="submit" id="order" class="checkout-btn">Checkout</button> --}}

                            </div>
                            @endif
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </form>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Event listener untuk hapus item dari keranjang
            document.querySelectorAll('.JSVV a').forEach(function (element) {
                element.addEventListener('click', function (event) {
                    event.preventDefault();
                    var formId = this.dataset.formId;
                    console.log("Submitting form ID: " + formId);
                    document.getElementById(formId).submit();
                });
            });
    
            // Event listener untuk tombol Checkout
            document.getElementById('order').addEventListener('click', function (event) {
                event.preventDefault();
                console.log("Submitting main form...");
                document.querySelector('.JSVV').submit(); // Submit form utama
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const orderButton = document.getElementById("order");
            const checkboxes = document.querySelectorAll(".item-checkbox");

            // Load checkbox state dari LocalStorage
            checkboxes.forEach((checkbox) => {
                const itemId = checkbox.value;
                const isChecked = localStorage.getItem(`cart-item-${itemId}`) === "true";
                checkbox.checked = isChecked;
            });

            // Simpan pilihan ke LocalStorage saat checkbox diklik
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    localStorage.setItem(`cart-item-${this.value}`, this.checked);
                });
            });

            // Cek apakah ada checkbox yang dipilih saat klik "Checkout"
            orderButton.addEventListener("click", function(event) {
                event.preventDefault();

                let selectedItems = [];
                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        selectedItems.push(checkbox.value);
                    }
                });

                if (selectedItems.length === 0) {
                    Swal.fire({
                        title: "Pilih Produk!"
                        , text: "Silakan pilih setidaknya satu produk untuk di-checkout."
                        , icon: "warning"
                        , confirmButtonText: "OK"
                    , });
                } else {
                    Swal.fire({
                        title: "Checkout?"
                        , text: "Apakah Anda ingin melanjutkan ke checkout hanya dengan produk yang dipilih?"
                        , icon: "question"
                        , showCancelButton: true
                        , confirmButtonText: "Lanjut"
                        , cancelButtonText: "Batal"
                    , }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim hanya item yang dipilih ke halaman checkout
                            // let checkoutUrl = `{{ url('/checkout') }}?selectedItems=${selectedItems.join(",")}`;
                            // window.location.href = checkoutUrl;
                        }
                    });
                }
            });
        });

    </script>



</body>
</html>
