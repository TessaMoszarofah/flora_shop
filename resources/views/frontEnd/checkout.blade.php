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

    <div class="hero-wrap hero-bread" style="background-image: url({{asset('images/background.jpg')}});" id="content-checkout">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('checkout.order')}}" class="JSV billing-form" id="myForm" method="POST">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">
                        @csrf
                        <h3 class="mb-4 billing-heading" id="data-customer">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="w-100"></div>                           
                            <div class="col-md-12" id="form-alamat">
                                <div class="form-group">
                                    <label for="streetaddress">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="House number and street name">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6" id="form-kota">
                                <div class="form-group">
                                    <label for="towncity">Kota</label>
                                    <input type="text" name="kota" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6" id="form-kodepos">
                                <div class="form-group">
                                    <label for="postcodezip">Kode Pos</label>
                                    <input type="text" name="kode_pos" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6" id="form-numberhp">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6" id="form-email">
                                <div class="form-group">
                                    <label for="emailaddress">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio" id="create-account"> Create an Account? </label>
                                        <label><input type="radio" name="optradio" id="forgot-password"> Ship to different address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4" id="cart-total">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    @foreach($carts as $cart)

                                    {{-- <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>Rp. {{$cart->quantity * $cart->produk->harga}}</span>
                                    </p> --}}
                                    <p class="d-flex">
                                        <span>{{ $cart->produk ? $cart->produk->nama_produk : 'Produk Tidak Tersedia' }}</span>
                                        <span>{{$cart->produk ? number_format($cart->produk->harga): '0'}}</span>
                                    </p>
                                    {{-- <p class="d-flex">
                                    <span>Discount</span>
                                    <span>$3.00</span>
                                </p> --}}
                                   
                                    @endforeach
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>Rp. {{number_format($total)}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4" id="metode-pembayaran">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                    <p><a href="javascript:void(0)" data-form-id="myForm" class="JSV btn btn-primary py-3 px-4" id="order">Place an order</a></p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-8 -->
                </div>
            </div>
        </section> <!-- .section -->
    </form><!-- END -->

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
                            <input type="submit" value="Subscribe" class="submit px-3" id="submit-button">
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


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const orderButton = document.getElementById('order');
                    
                    if (orderButton) {
                        orderButton.addEventListener('click', function(event) {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Pesanan Anda berhasil dibuat! Terima kasih telah berbelanja di Flora Shop.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const formId = this.dataset.formId;
                                    const form = document.getElementById(formId);
                                    if (form) {
                                        form.submit();
                                    }
                                }
                            });
                        });
                    }
                });
            </script>
            
    
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

</body>
</html>