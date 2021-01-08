<?php
session_start();
include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Berita</title>
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
    ?>



    <section class="ftco-about img ftco-section" style="padding-top: 150px;">
        <?php
        $sql = mysqli_query($con, "SELECT * FROM tb_berita");
        while ($db = mysqli_fetch_assoc($sql)) {
        ?>
            <div class="container" style="margin-bottom: 150px; background: #FFFFF5;">
                <div class="row d-flex no-gutters">
                    <div class="col-md-6 col-lg-6 d-flex">
                        <div class="img-about img d-flex align-items-stretch">
                            <div class="img img-video d-flex align-self-stretch align-items-center" style="background-image:url(admin/images/berita/<?= $db['gambar_berita']; ?>); height:400px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 pl-md-5">
                        <div class="heading-section ftco-animate">
                            <h2 class="mb-4" style="padding-top: 10%"><?= $db['judul_berita']; ?></h2>
                            <p><?= $db['isi_singkat']; ?></p>
                            <a href="berita_detail.php?id=<?= $db['id_berita']; ?>" class="btn btn-outline-dark">Baca Selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
    <!-- Awal footer -->
    <footer class="ftco-footer py-5 mt-5">
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