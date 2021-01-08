<?php
session_start();
include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tentang Kami</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/fontawesome5/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php
    include "navbar.php";
    include "navbar_2.php";
    ?>

    <!-- Tentang kami -->
    <section class="ftco-about img ftco-section" id="profil">

        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 col-lg-6 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img img-video d-flex align-self-stretch align-items-center" style="background-image:url(images/tentangkami/robusta.jpg);">
                            <div class="video justify-content-center">
                                <a href="https://www.youtube.com/watch?v=vst9A0I2DNQ" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                                    <i class="fad fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 pl-md-5" style="background: #FFFFF5;">
                    <div class="heading-section ftco-animate">
                        <h2 class="mb-4">Pondok kopi 57.58 adalah produk <br>kopi asli dari jember</h2>
                        <p>Pengasuh Ponpes Al Hasan 1 di dalam meningkatkan SDM Santri dan masyarakat petani kopi dilereng pegunungan Argopuro Jember beliau memberikan pembelajaran berwirausaha di pabrik Pondok Kopi 57.58
                        </p>
                        <p>Khususnya dibidang Marketing dan Processing Kopi hingga menjadi bubuk Kopi siap saji atas didikan Pembina Ponpes Al Hasan 1 Agus Misbachul Khoiri Ali sekaligus menantu Pengasuh Ponpes Al Hasan 1 dan sebagai business owner (pemilik usaha) pabrik Pondok Kopi 57.58.
                        </p>
                        <div class="counter-wrap ftco-animate d-flex my-md-4">
                            <div class="text">
                                <p class="mb-4">
                                    <span class="number" data-number="4">0</span>
                                    <span>Produk Tersedia</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="img img-about-2 mr-2" style="background-image: url(images/tentangkami/biji1.jpg);"></div>
                            <div class="img img-about-2 ml-2" style="background-image: url(images/tentangkami/biji2.jpg);"></div>
                        </div>
                        <blockquote class="blockquote mt-5">
                            <p class="mb-2">"Apapun pekerjaanmu yang paling penting kamu menikmatinya seperti secangkir kopi dipagi hari ini, satu gelas kopi dan pikirkan gerak mencari solusi."</p>
                            <span>&mdash; M Lutfi</span>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Tentang kami -->



    <!-- Awal footer -->
    <footer class="ftco-footer py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> Selamat menikmati produk kopi kami | by <a href="index.php" target="_blank"> Pondok Kopi 57.58</a>
                    </p>

                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-twitter"></i></span></a></li>
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-facebook-f"></i></span></a></li>
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-instagram"></i></span></a></li>
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-pinterest-p"></i></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>