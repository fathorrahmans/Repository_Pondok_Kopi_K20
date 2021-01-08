<?php
session_start();
include "koneksi/koneksi.php";
// echo '<pre>';
// print_r($_SESSION['keranjang']);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nota Pesanan</title>
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
    <style>
        .figur {
            padding-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            font-size: 20px;
            font-weight: 700;
        }

        .bawah {
            background: #F7F7ED;
            color: black;
        }

        .bawahh {
            border-top: 1px solid rgb(112, 112, 112);

        }

        .k1 {
            text-align: left;
            padding: 2px 20px;
        }

        .k2 {
            text-align: right;
            padding: 2px 50px;
        }

        .k11 {
            text-align: left;
            padding: 15px 20px;
        }

        .k3 {
            text-align: right;
            color: red;
            padding: 14px 50px;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <?php
    include "navbar.php";
    include "navbar_2.php";
    ?>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col" style="text-align:center; text-transform:uppercase; font-weight:1000; font-size:25px;">
                    <p> Nota Pesanan </p>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = mysqli_query($con, "SELECT * FROM tb_pesan JOIN tb_pelanggan ON tb_pesan.id_pelanggan=tb_pelanggan.id_pelanggan 
                                    JOIN tb_ongkir ON tb_pesan.id_ongkir=tb_ongkir.id_ongkir
                                            WHERE tb_pesan.id_pesan='$_GET[id]'");
            $detail = mysqli_fetch_assoc($sql);
            ?>
            <?php
            $idpelangganyangbeli = $detail["id_pelanggan"];
            $idpelangganyanglogin = $_SESSION["id_pelanggan"];
            if ($idpelangganyangbeli !== $idpelangganyanglogin) {
                echo "<script>alert('jangan nakal');location='pesanan.php'</script>";
            }
            ?>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col" style="background:#FFFFF5; ">
                    <figure class="figur">
                        <img src="images/logo_pkopi2.png" width="300px">
                    </figure>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col" class="atas" style="background:#FFFFF5; ">
                    <h6 style="color: black; font-weight: 700;">No Pesanan : <?php echo $detail['id_pesan'] ?></h6>
                    <p style="background: #F7F7ED; color: black; padding: 10px;"><b>Nama Pelanggan: </b> <?= $detail['nama'] ?>
                        <br><b>No. Handphone: </b> <?= $detail['no_telp'] ?>
                        <br><b>Pesanan Dibuat: </b> <?php echo date("d - m - Y", strtotime($detail['tanggal_pesan'])) ?>
                        <br><b>Alamat Pengiriman: </b> <?= $detail['alamat_lengkap'] ?>
                    </p>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col" style="background:#FFFFF5; ">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No. </th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $nomor = 1;
                            $sql = mysqli_query($con, "SELECT * FROM tb_pesan_detail d INNER JOIN tb_produk_variasi v ON d.id_variasi=v.id_variasi INNER JOIN tb_produk p ON v.id_produk=p.id_produk WHERE d.id_pesan='$_GET[id]'");
                            while ($d = mysqli_fetch_assoc($sql)) {
                                $subtotal = $subtotal + $d['subtotal'];
                            ?>
                                <td class="text-center"><?php echo $nomor++; ?></td>
                                <td class="text-center"><?php echo $d["nama_depan"];
                                                        echo " ";
                                                        echo $d["nama_belakang"]; ?></td>
                                <td class="text-center">Rp.<?php echo number_format($d["harga_variasi"]); ?></td>
                                <td class="text-center"><?php echo $d['jumlah'] ?></td>
                                <td class="text-center"><?php echo number_format($d['subtotal']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4" style="background:#FFFFF5;"></div>
                <div class="col-sm-2 bawah k1">Subtotal untuk produk</div>
                <div class="col-sm-2 bawah k2">Rp <?= number_format($subtotal) ?></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4" style="background:#FFFFF5; "></div>
                <div class="col-sm-2 bawah k1">Ongkos Pengiriman</div>
                <div class="col-sm-2 bawah k2">Rp <?= number_format($detail['harga_ongkir']) ?></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4" style="background:#FFFFF5; "></div>
                <div class="col-sm-2 bawahh bawah k11">Total Pembayaran</div>
                <div class="col-sm-2 bawahh bawah k3">Rp <?php echo number_format($detail['total']) ?></div>
                <div class="col-sm-2"></div>
            </div>

            <div class="row mt-4">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <p>
                            Silahkan melakukan pembayaran <b> Rp <?php echo number_format($detail['total']); ?> </b> ke <br>
                            <strong>BANK MANDIRI 137-889900-753 AN. Fathor Rahman </strong>
                        </p>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
    <!-- <section>
    <div class="container" style="background:white;">
      <pre>
				<?php
                echo '<pre>';
                echo "Array Tampil Detail Pesanan  : <br>";
                print_r($detail);

                echo '</pre>';

                ?>
				</pre>
    </div>
  </section> -->

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